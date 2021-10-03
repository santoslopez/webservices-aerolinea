<?php 

include '../conexion/conexion.php';

$aerolinea = $_GET['aerolinea'];
$vuelo = $_GET['vuelo'];



$fechaA = $_GET['fecha'];
$formatoResultado = $_GET['formato'];

$year = substr($fechaA,0,4);
$month = substr($fechaA,4,2);
$day = substr($fechaA,6,2);

$fechaIng = "$year-$month-$day";


$listadoVuelos ="SELECT DISTINCT aerol.matricula, V.fecha, R.aeropuertoOrigen, R.aeropuertoDestino,V.numeroVuelo 
FROM Rutas AS R, Viaje AS V, Aeronave AS aerol,Aeronave AS aer,Aeropuerto AS aerop,Viaje viaj
WHERE V.numeroVuelo = R.numeroVuelo AND R.aeropuertoOrigen = aerop.codigoAeropuerto AND R.aeropuertoDestino = aerop.codigoAeropuerto AND V.fecha = '$fechaIng'
AND aer.matricula='$aerolinea' and viaj.codigoViaje='$vuelo'";

//echo "consulta $listadoVuelos";

$infoVuelos  = "SELECT b.fila,b.posicion FROM Boletos as b,Viaje as v Where v.codigoViaje='$vuelo'";


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
                $arrayDatosConsulta1 = array(); 

                //echo '<lista_vuelos>';
                //echo "\t<aerolinea>EY</aerolinea>\n";
                    while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                        $aerolinea = $row[0];

                        $fecha = $row[1];
                        $origen = $row[2];
                        $destino = $row[3];
            
                        $fechaISO = str_replace('-','',$fecha);
                        //echo "esto DDDDy 4444 $aerolinea";

                    
                        $arreglo1 = array ("aerolinea"=>$aerolinea,"fecha"=>$fechaISO,"origen"=>$origen,"destino"=>$destino);
                        //echo "ddd xxx$arreglo";
                        //header('Content-Type: application/json');
                        //$json_string = json_encode($arreglo);
                        //echo $json_string; 

                        if (!(pg_num_rows($consultaInfoVuelos))) {
                            echo '<lista_vuelos>No hay informacion</lista_vuelos>';
                        }else{
                            //echo "ENTRE";
                            while ($row= pg_fetch_row($consultaInfoVuelos)) {     
                                $fila = $row[0];
                                $posicion= $row[1];
                           
                                $arrayDatosConsulta1[] = array("asientos"=>array("fila"=>$fila,"posicion"=>$posicion));
                              
                                
                               
                            }
                             //echo "aqui";
                    header('Content-Type: application/json');
                    $json_string = json_encode($arreglo1 + $arrayDatosConsulta1);
                    echo $json_string; 
                            
                        }
                    }
               
            }
}

function resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos){
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo '<lista_asientos>No hay informacion</lista_asientos>';
        }else{
            echo '<lista_asientos>';
            //echo "\t<aerolinea>EY</aerolinea>\n";
                while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                    $aerolinea = $row[0];
                    $fecha = $row[1];
                    $origen = $row[2];
                    $destino = $row[3];
                    $numero = $row[4];
        
                    $fechaISO = str_replace('-','',$fecha);
                    echo "\t<aerolinea>$aerolinea</aerolinea>\n";
                    echo "\t<fecha>$fechaISO</fecha>\n";
                    echo "\t<origen>$origen</origen>\n";
                    echo "\t<destino>$destino</destino>\n";
                    echo "\t<numero>$numero</numero>\n";

                    if (!(pg_num_rows($consultaInfoVuelos))) {
                        echo '<asiento>No hay informacion</asiento>';
                    }else{
                        while ($row= pg_fetch_row($consultaInfoVuelos)) {     
                            $fila= $row[0];
                            $posicion= $row[1];
                            
                            //$horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));  
        
                            echo "\t<asiento>\n";
                            echo "\t\t<fila>$fila</fila>\n";
                            echo "\t\t<posicion>$posicion</posicion>\n";
                            echo "\t\t</asiento>\n";
                        }
                    }
                }
            echo "</lista_asientos>";
        }
}

//Se permite que se ingrese 3 parametros o 4 con el formato
if (($aerolinea && $vuelo && $fechaA)  || ($aerolinea && $vuelo && $fechaA && $formatoResultado) ) {
    
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

