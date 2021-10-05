<?php 

include '../aerolineacc6/conexion/conexion.php';
include '../aerolineacc6/aerolinea/aerolinea.php';

$origenA = $_GET['origen'];
$destinoA = $_GET['destino'];
$fechaA = $_GET['fecha'];

$formatoResultado = $_GET['formato'];

$year = substr($fechaA,0,4);
$month = substr($fechaA,4,2);
$day = substr($fechaA,6,2);

$fechaIng = "$year-$month-$day";

$listadoVuelos ="SELECT DISTINCT V.fecha, R.aeropuertoOrigen, R.aeropuertoDestino
                 FROM Rutas AS R, Viaje AS V
                 WHERE V.numeroVuelo = R.numeroVuelo AND R.aeropuertoOrigen = '$origenA' AND R.aeropuertoDestino = '$destinoA' AND V.fecha = '$fechaIng' ";

$infoVuelos  = "SELECT V.numeroVuelo, R.horaSalida, V.precio
                FROM Viaje AS V, Rutas AS R
                WHERE V.numeroVuelo = R.numeroVuelo AND V.fecha = '$fechaIng' AND R.aeropuertoOrigen = '$origenA' AND R.aeropuertoDestino = '$destinoA'";


$ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoVuelos);
$consultaInfoVuelos = pg_query($conexion, $infoVuelos);

function resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea){
    $info = array();
    $vuelos = array();
    $info['lista_vuelos'] = array();

    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo json_encode(array('mensaje' => 'No existen vuelos'));
    }else{
        while ($row = pg_fetch_row($ejecutarConsultaObtenerInfo)) {

            $fecha = $row[0];
            $origen = $row[1];
            $destino = $row[2];
    
            if (!(pg_num_rows($consultaInfoVuelos))) {
                echo json_encode(array(''));
            }else{
                while ($row = pg_fetch_row($consultaInfoVuelos)) {

                    $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$row[1])->format('H:i'));  

                    $vuelo = array(
                        'numero' => $row[0],
                        'hora' => $horaISO,
                        'precio' => $row[2]
                    );
                    array_push($vuelos, $vuelo);
                }
            }
        }
        //echo json_encode($info);
        $fechaISO = str_replace('-','', $fecha);
        $info['lista_vuelos'] = array('aerolinea' => $aerolinea, 'fecha' => $fechaISO, 'origen' => $origen, 'destino' => $destino, 'vuelos'=> $vuelos);
    
        header('Content-Type: application/json');
        echo json_encode($info);
    }
}

function resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea){
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo '<lista_vuelos>No hay informacion</lista_vuelos>';
        }else{
            echo '<lista_vuelos>';
            //echo "\t<aerolinea>EY</aerolinea>\n";
                while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {

                    $fecha = $row[0];
                    $origen = $row[1];
                    $destino = $row[2];
        
                    $fechaISO = str_replace('-','', $fecha);

                    echo "\t<aerolinea>$aerolinea</aerolinea>\n";
                    echo "\t<fecha>$fechaISO</fecha>\n";
                    echo "\t<origen>$origen</origen>\n";
                    echo "\t<destino>$destino</destino>\n";
        
                    if (!(pg_num_rows($consultaInfoVuelos))) {
                        echo '<vuelos></vuelos>';
                    }else{
                        while ($row= pg_fetch_row($consultaInfoVuelos)) {     
                            $numero = $row[0];
                            $hora= $row[1];
                            $precio= $row[2];
        
                            $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));  
        
                            echo "\t<vuelo>\n";
                            echo "\t\t<numero>$numero</numero>\n";
                            echo "\t\t<hora>$horaISO</hora>\n";
                            echo "\t\t<precio>$precio</precio>\n";
                            echo "\t\t</vuelo>\n";
                        }
                    }
                }
            echo "</lista_vuelos>";
        }
}

//Se permite que se ingrese 3 parametros o 4 con el formato
if (($origenA && $destinoA && $fechaA)  || ($origenA && $destinoA && $fechaA && $formatoResultado) ) {
    
    //Verificamos si existe un cuarto parametro
    if (( empty ($formatoResultado ) ? NULL : $formatoResultado)) {
        //establecer formatos
        $formatoXML = "XML";
        $formatoJSON = "JSON";

        # Se verifica que el formato es XML del cuarto parametro
        if (strcmp($formatoResultado, $formatoXML) === 0){
            resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea);
        # Se verifica que el formato es JSON del cuarto parametro
        }else  if (strcmp($formatoResultado, $formatoJSON) === 0){
            resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea);
        }else {
            # code...
            echo "El formato ingresado $formatoResultado no se reconoce";
        }

    }else {
        // no se agrego ningun formato por default es XML
        resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea);
    }

}else {
    echo "<h2>Parametros ingresados incorrectos</h2>";
    echo "<p>Formato esperado: script_lista_vuelos?origen=GUA&destino=FLW&fecha=20210824&formato=JSON</p><br>";
    echo "<p>Formato esperado: script_lista_vuelos?origen=GUA&destino=FLW&fecha=20210824&formato=XML</p><br>";
    echo "<p>Formato esperado: script_lista_vuelos?origen=GUA&destino=FLW&fecha=20210824</p></br>";

}

?> 

