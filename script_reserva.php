<?php 

include '../aerolineacc6/conexion/conexion.php';
include '../aerolineacc6/aerolinea/aerolinea.php';

$aerolineaA = $_GET['aerolina'];
$asiento = $_GET['asiento'];
$vuelo = $_GET['vuelo'];
$fechaA = $_GET['fecha'];
$nombre = $_GET['nombre'];

$formatoResultado = $_GET['formato'];

$year = substr($fechaA,0,4);
$month = substr($fechaA,4,2);
$day = substr($fechaA,6,2);

$fechaIng = "$year-$month-$day";

$posicionA = substr($asiento, -1);

if(strlen($asiento) == 3){
    $filaA = substr($asiento, 0, 2);
}else if(strlen($asiento) == 2){
    $filaA = substr($asiento, 0, 1);
}

$consultaAsientoOcupado = " SELECT V.codigoViaje, V.numeroVuelo, V.fecha, B.fila, B.posicion, B.nombrePasajero
                            FROM Boletos AS B, Viaje AS V
                            WHERE B.codigoViaje = V.codigoViaje AND V.numeroVuelo = $vuelo AND V.fecha = '$fechaIng' AND B.fila = $filaA AND B.posicion = '$posicionA' AND B.nombrePasajero = '$nombre' 
                            ORDER BY B.fila, B.posicion ";

$consultaCodigoViaje = "SELECT DISTINCT V.codigoViaje
                        FROM Viaje AS V, Rutas AS R
                        WHERE V.numeroVuelo = R.numeroVuelo AND V.numeroVuelo = $vuelo ";

$ejecutarConsultaAsientoOcupado = pg_query($conexion, $consultaAsientoOcupado);

$ejecutarConsultaCodigoViaje = pg_query($conexion, $consultaCodigoViaje);


function resultadosJSON($ejecutarConsultaAsientoOcupado, $ejecutarConsultaCodigoViaje, $aerolinea, $nombre, $filaA, $posicionA, $conexion, $fechaIng, $vuelo){   
    
    if (!(pg_num_rows($ejecutarConsultaAsientoOcupado))) {
        
        if(!(pg_num_rows($ejecutarConsultaCodigoViaje))){
            echo "no existe codigoviaje";
        }else{
            while ($row = pg_fetch_row($ejecutarConsultaCodigoViaje)) {
                $codigoViaje = $row[0];
            }

            $consulta  = sprintf("INSERT INTO Boletos(nombrePasajero, fila, posicion, codigoViaje) VALUES('%s','%s','%s','%s');",
            pg_escape_string($nombre),
            pg_escape_string($filaA),
            pg_escape_string($posicionA),
            pg_escape_string($codigoViaje)
            );
            
            $ejecutarConsulta = pg_query($conexion, $consulta);
            $info['boleto'] = array();
            if ($ejecutarConsulta) {
                $consultaAsientoOcupado2 = " SELECT V.numeroVuelo, V.fecha, R.horaSalida, B.numeroBoleto
                            FROM Boletos AS B, Viaje AS V, Rutas AS R
                            WHERE B.codigoViaje = V.codigoViaje AND R.numeroVuelo = V.numeroVuelo AND V.numeroVuelo = $vuelo AND V.fecha = '$fechaIng' AND B.fila = $filaA AND B.posicion = '$posicionA' AND B.nombrePasajero = '$nombre'
                            ORDER BY B.fila, B.posicion ";

                $ejecutarConsultaAsientoOcupado2 = pg_query($conexion, $consultaAsientoOcupado2);

                if(!(pg_num_rows($ejecutarConsultaAsientoOcupado2))){
                    echo "no existe codigoviaje";
                }else{
                    while ($row = pg_fetch_row($ejecutarConsultaAsientoOcupado2)) {
                        $numeroVuelo = $row[0];
                        $fecha = $row[1];
                        $hora = $row[2];
                        $numero = $row[3];
                    }
                    
                    $fechaISO = str_replace('-','', $fecha);
                    $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));
                    $info['boleto'] = array('aerolinea' => $aerolinea, 'vuelo' => $numeroVuelo, 'fecha' => $fechaISO, 'hora' => $horaISO, 'numero'=> $numero);
    
                    header('Content-Type: application/json');
                    echo json_encode($info);
                }
            }else{
                echo "los datos ingresados no se guardaron\n";
            }
        }
    }else{ 
        header('Content-Type: application/json');
        echo json_encode(array('El asiento esta ocupado'));
    }
}

function resultadosXML($ejecutarConsultaAsientoOcupado, $ejecutarConsultaCodigoViaje, $aerolinea, $nombre, $filaA, $posicionA, $conexion, $fechaIng, $vuelo){

    
    if (!(pg_num_rows($ejecutarConsultaAsientoOcupado))) {
        
        if(!(pg_num_rows($ejecutarConsultaCodigoViaje))){
            echo "no existe codigoviaje";
        }else{
            while ($row = pg_fetch_row($ejecutarConsultaCodigoViaje)) {
                $codigoViaje = $row[0];
            }

            $consulta  = sprintf("INSERT INTO Boletos(nombrePasajero, fila, posicion, codigoViaje) VALUES('%s','%s','%s','%s');",
            pg_escape_string($nombre),
            pg_escape_string($filaA),
            pg_escape_string($posicionA),
            pg_escape_string($codigoViaje)
            );
            
            $ejecutarConsulta = pg_query($conexion, $consulta);
            if ($ejecutarConsulta) {
                //echo "guardados correctamente\n";

                $consultaAsientoOcupado2 = " SELECT V.numeroVuelo, V.fecha, R.horaSalida, B.numeroBoleto
                            FROM Boletos AS B, Viaje AS V, Rutas AS R
                            WHERE B.codigoViaje = V.codigoViaje AND R.numeroVuelo = V.numeroVuelo AND V.numeroVuelo = $vuelo AND V.fecha = '$fechaIng' AND B.fila = $filaA AND B.posicion = '$posicionA' AND B.nombrePasajero = '$nombre' 
                            ORDER BY B.fila, B.posicion";

                $ejecutarConsultaAsientoOcupado2 = pg_query($conexion, $consultaAsientoOcupado2);

                if(!(pg_num_rows($ejecutarConsultaAsientoOcupado2))){
                    echo "no existe codigoviaje";
                }else{
                    while ($row = pg_fetch_row($ejecutarConsultaAsientoOcupado2)) {
                        $numeroVuelo = $row[0];
                        $fecha = $row[1];
                        $hora = $row[2];
                        $numero = $row[3];
                    }
                    
                    $fechaISO = str_replace('-','', $fecha);
                    $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));

                    echo "<boleto>";
                    echo "<aerolinea>$aerolinea</aerolinea>";
                    echo "<vuelo>$numeroVuelo</vuelo>";
                    echo "<fecha>$fechaISO</fecha>";
                    echo "<hora>$horaISO</hora>";
                    echo "<numero>$numero</numero>";
                    echo "</boleto>";
                }
            }else{
                echo "los datos ingresados no se guardaron\n";
            }
        }
    }else{ 
        echo "<boleto>";
        echo "El asiento esta ocupado";
        echo "</boleto>";
    }
}

if($aerolinea == $aerolineaA){
    
    //Se permite que se ingrese 4 parametros o 5 con el formato
    if (($aerolinea  && $fechaA && $vuelo && $asiento && $nombre)  || ($aerolinea  && $fechaA && $vuelo && $asiento && $nombre && $formatoResultado)) {
        
        //Verificamos si existe un cuarto parametro
        if (( empty ($formatoResultado ) ? NULL : $formatoResultado)) {
            //establecer formatos
            $formatoXML = "XML";
            $formatoJSON = "JSON";
    
            # Se verifica que el formato es XML del cuarto parametro
            if (strcmp($formatoResultado, $formatoXML) === 0){
                resultadosXML($ejecutarConsultaAsientoOcupado, $ejecutarConsultaCodigoViaje, $aerolinea, $nombre, $filaA, $posicionA, $conexion, $fechaIng, $vuelo);
            # Se verifica que el formato es JSON del cuarto parametro
            }else  if (strcmp($formatoResultado, $formatoJSON) === 0){
                resultadosJSON($ejecutarConsultaAsientoOcupado, $ejecutarConsultaCodigoViaje, $aerolinea, $nombre, $filaA, $posicionA, $conexion, $fechaIng, $vuelo);
            }else {
                # code...
                echo "El formato ingresado $formatoResultado no se reconoce";
                echo "Esperaba aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=NombreFormato";
            }
    
        }else {
            // no se agrego ningun formato por default es XML
            resultadosXML($ejecutarConsultaAsientoOcupado, $ejecutarConsultaCodigoViaje, $aerolinea, $nombre, $filaA, $posicionA, $conexion, $fechaIng, $vuelo);
        }
    
    }else {
    
        echo "<h2>Parametros ingresados incorrectos</h2>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=JSON</p>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=XML</p>";
        echo "<p>script_reserva?aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez</p>";
    }
}

?> 