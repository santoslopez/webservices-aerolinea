<?php 

include '../conexion/conexion.php';
include '../aerolinea/aerolinea.php';

$aerolinea = $_GET['aerolinea'];
$asiento = $_GET['asiento'];
$vuelo = $_GET['vuelo'];
$fechaA = $_GET['fecha'];
$nombre = $_GET['nombre']; 

$formatoResultado = $_GET['formato'];

$year = substr($fechaA,0,4);
$month = substr($fechaA,4,2);
$day = substr($fechaA,6,2);

$fechaIng = "$year-$month-$day";

$posicion = substr($asiento, -1);

if(strlen($asiento) == 3){
    $fila = substr($asiento, 0, 2);
}else if(strlen($asiento) == 2){
    $fila = substr($asiento, 0, 1);
}


$consultaCodigoViaje =" SELECT DISTINCT V.codigoViaje 
                        FROM Boletos AS B, Viaje AS V, Rutas AS R
                        WHERE V.codigoViaje = B.codigoViaje AND R.codigoViaje = V.codigoViaje AND V.numeroVuelo = $vuelo";

$queryCodigoViaje = pg_query($conexion, $consultaCodigoViaje);

if(!(pg_num_rows($queryCodigoViaje))){
    echo "No hay viajes asociados";
}else{
    while($row = pg_fetch_row($queryCodigoViaje)){
        $codigoViaje = $row[0];
    }
}

$infoVuelos  = "SELECT V.numeroVuelo, V.fecha, R.horaSalida, B.numeroBoleto
                FROM Boletos as B, Viaje AS V, Rutas AS R
                WHERE V.codigoViaje = B.codigoViaje AND R.numeroVuelo = V.numeroVuelo AND  V.numeroVuelo = $vuelo AND B.fila = $fila AND B.posicion = '$posicion' ";

$verificarBoleto = "SELECT * FROM Boletos WHERE fila = $1 AND posicion = $2 AND codigoViaje = $3 ";
	
pg_prepare($conexion,"prepareVerificarBoleto",$verificarBoleto) or die("Cannot prepare statement.");

$ejecutarConsultaVerificarBoleto = pg_execute($conexion,"prepareVerificarBoleto", array($fila, $posicion, $codigoViaje));


//$ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoVuelos);
$consultaInfoVuelos = pg_query($conexion, $infoVuelos);

function resultadosJSON($consultaInfoVuelos, $aerolinea, $ejecutarConsultaVerificarBoleto, $nombre, $fila, $posicion, $codigoViaje, $conexion ){
    $info = array();
    $info['boleto'] = array();

    if (!(pg_num_rows($consultaInfoVuelos))) {
        echo json_encode(array('Parametros incorrectos'));
    }else{
        while ($row = pg_fetch_row($consultaInfoVuelos)) {
            $vuelo = $row[0];
            $fecha = $row[1];
            $hora = $row[2];
            $numero = $row[3];
        }
        //echo json_encode($info);
        $fechaISO = str_replace('-','', $fecha);
        $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s', $hora)->format('H:i'));
        $info['boleto'] = array('aerolinea' => $aerolinea, 'vuelo' => $vuelo, 'fecha' => $fechaISO, 'hora' => $horaISO, 'numero' => $numero);
    
        header('Content-Type: application/json');
        echo json_encode($info);
    }

    if (pg_num_rows($ejecutarConsultaVerificarBoleto)) {
        echo "asiento ocupado";
     }else {
     
         $consulta  = sprintf("INSERT INTO Boletos(nombrePasajero, fila, posicion, codigoViaje) VALUES('%s','%s','%s','%s');",
         pg_escape_string($nombre),
         pg_escape_string($fila),
         pg_escape_string($posicion),
         pg_escape_string($codigoViaje)
         );
         $ejecutarConsulta = pg_query($conexion, $consulta);
     
         if ($ejecutarConsulta) {
             //echo "datos guardados correctamente";
         }else{
             echo "Existe un error";
         }        
     }

}

function resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos){
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo '<boleto>No hay informacion</boleto>';
        }else{
            echo '<boleto>';
            //echo "\t<aerolinea>EY</aerolinea>\n";
                while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                    $aerolinea = $row[0];
                    $fechaISO = str_replace('-','',$fecha);
                    echo "\t<aerolinea>$aerolinea</aerolinea>\n";
                
        
                    if (!(pg_num_rows($consultaInfoVuelos))) {
                        echo 'No hay informacion de viajes';
                    }else{
                        while ($row= pg_fetch_row($consultaInfoVuelos)) {     
                            //$aerolinea = $row[0];
                            $fecha= $row[1];
                            $hora= $row[2];
                            $numero= $row[3];

                            $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));  
    
                            echo "\t\t<vuelo>$numero</vuelo>\n";
                            echo "\t\t<fecha>$fecha</fecha>\n";
                            echo "\t\t<hora>$horaISO</hora>\n";
                            echo "\t\t<numero>$numero</numero>\n";

                        }
                    }
                }
            echo "</boleto>";
        }
}

if($aerolinea == 'EY'){
    
    //Se permite que se ingrese 4 parametros o 5 con el formato
    if (($aerolinea  && $fechaA && $vuelo && $asiento && $nombre)  || ($aerolinea  && $fechaA && $vuelo && $asiento && $nombre && $formatoResultado)) {
        
        //Verificamos si existe un cuarto parametro
        if (( empty ($formatoResultado ) ? NULL : $formatoResultado)) {
            //establecer formatos
            $formatoXML = "XML";
            $formatoJSON = "JSON";
    
            # Se verifica que el formato es XML del cuarto parametro
            if (strcmp($formatoResultado, $formatoXML) === 0){
                resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
            # Se verifica que el formato es JSON del cuarto parametro
            }else  if (strcmp($formatoResultado, $formatoJSON) === 0){
                resultadosJSON($consultaInfoVuelos, $aerolinea, $ejecutarConsultaVerificarBoleto, $nombre, $fila, $posicion, $conexion, $codigoViaje);
            }else {
                # code...
                echo "El formato ingresado $formatoResultado no se reconoce";
                echo "Esperaba aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=NombreFormato";
            }
    
        }else {
            // no se agrego ningun formato por default es XML
            resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
        }
    
    }else {
    
        echo "<h2>Parametros ingresados incorrectos</h2>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=JSON</p>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=XML</p>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez</p>";
    }
}

?> 