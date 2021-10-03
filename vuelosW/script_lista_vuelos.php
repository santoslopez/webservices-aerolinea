<?php 

include '../conexion/conexion.php';

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

function resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos){
            // verificamos que existen registros, sino no dibujamos la tabla
            if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
                $arrayDatosConsulta = array(); 
                //header('Access-Control-Allow-Origin: *');
                header('Content-Type: application/json');
                $arrayDatosConsulta[] = array("Mensaje"=>"No hay informacion");
                //Creamos el JSON
                $json_string = json_encode($arrayDatosConsulta);
                echo $json_string; 
                //echo '<lista_vuelos>No hay informacion</lista_vuelos>';
            }else{
                $arrayDatosConsulta = array(); 

                //echo '<lista_vuelos>';
                //echo "\t<aerolinea>EY</aerolinea>\n";
                    while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                        $fecha = $row[0];
                        $origen = $row[1];
                        $destino = $row[2];
            
                        $fechaISO = str_replace('-','',$fecha);

                    
                        $arreglo = array ("aerolinea"=>"no detectado","fecha"=>$fechaISO,"origen"=>$origen,"destino"=>$destino);
                      
                        if (!(pg_num_rows($consultaInfoVuelos))) {
                            echo '<lista_vuelos>No hay informacion</lista_vuelos>';
                        }else{
                            while ($row= pg_fetch_row($consultaInfoVuelos)) {     
                                $numero = $row[0];
                                $hora= $row[1];
                                $precio= $row[2];
            
                                $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));  
                                //$arrayDatosConsulta["vuelo"] = array("numero"=>$numero,"hora"=>$horaISO,"precio","numero"=>precio);
                                //$arrayDatosConsulta[] = array("vuelos"=>array ("numero"=>$numero,"hora"=>$horaISO,"precio"=>$precio));
                                $arrayDatosConsulta["vuelos"] = "[";
                                $arrayDatosConsulta[] = array("numero"=>$numero,"hora"=>$horaISO,"precio"=>$precio);
                                
                    
                               
                            }
                           
                        }
                    }
                    header('Content-Type: application/json');
                    $json_string = json_encode($arreglo + $arrayDatosConsulta);
                    echo $json_string; 
                   
                //echo "</lista_vuelos>";
            }
}

function resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos){
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo '<lista_vuelos>No hay informacion</lista_vuelos>';
        }else{
            echo '<lista_vuelos>';
            echo "\t<aerolinea>EY</aerolinea>\n";
                while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                    $fecha = $row[0];
                    $origen = $row[1];
                    $destino = $row[2];
        
                    $fechaISO = str_replace('-','',$fecha);
        
                    echo "\t<fecha>$fechaISO</fecha>\n";
                    echo "\t<origen>$origen</origen>\n";
                    echo "\t<destino>$destino</destino>\n";
        
                    if (!(pg_num_rows($consultaInfoVuelos))) {
                        echo '<lista_vuelos>No hay informacion</lista_vuelos>';
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
            resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
        # Se verifica que el formato es JSON del cuarto parametro
        }else  if (strcmp($formatoResultado, $formatoJSON) === 0){
            resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
        }else {
            # code...
            ECHO "El formato ingresado $formatoResultado no se reconoce";
        }
    }else {
        // no se agrego ningun formato por default es XML
        resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
    }

}else {
    echo "Parametros no esperados";
}



?> 

