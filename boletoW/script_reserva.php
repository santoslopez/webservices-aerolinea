<?php 

include '../conexion/conexion.php';

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

$listadoVuelos ="SELECT matricula FROM Aeronave WHERE matricula='$aerolinea'";


$infoVuelos  = "SELECT aer.matricula as aerolinea,vi.fecha as fecha,rut.horaSalida as hora,bol.numeroBoleto AS numero FROM Viaje as vi,Aeronave AS aer, Boletos AS bol, Rutas as rut WHERE vi.codigoViaje=$vuelo
                AND bol.numeroBoleto=$vuelo AND aer.matricula='$aerolinea' AND  vi.fecha='$fechaIng'";

//**
 
//$infoVuelos ="SELECT aer.matricula as aerolinea,vi.fecha as fecha,rut.horaSalida as hora,bol.numeroBoleto AS numero FROM Viaje as vi,Aeronave AS aer, Boletos AS bol, Rutas as rut WHERE vi.codigoViaje=9
//AND bol.numeroBoleto=9 AND aer.matricula='1' AND  vi.fecha='2021-10-10'"; 
//*/



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
            }else{
                $arrayDatosConsulta = array(); 

                //echo '<lista_vuelos>';
                //echo "\t<aerolinea>EY</aerolinea>\n";
                    while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                        $aerolinea = $row[0];

                      
                        $fechaISO = str_replace('-','',$fecha);

                    
                        $arreglo = array ("aerolinea"=>$aerolinea);
                      
                        if (!(pg_num_rows($consultaInfoVuelos))) {
                            echo '<boletos>No hay informacion</boletos>';
                        }else{
                            while ($row= pg_fetch_row($consultaInfoVuelos)) {  
                                //$vuelo = $row[0];
   
                                $fecha = $row[1];
                                $hora= $row[2];
                                //$numer= $row[2];
                                $vuelo= $row[3];

                                $horaISO = str_replace(':', '', DateTime::createFromFormat('H:i:s',$hora)->format('H:i'));  
                                $arrayDatosConsulta = array("vuelo"=>$vuelo,"fecha"=>$fecha,"hora"=>$hora,"numero"=>$vuelo);                    
                               
                            }
                          
                           
                        }
                    }
                    
                    header('Content-Type: application/json');
                    $json_string = json_encode($arreglo + $arrayDatosConsulta);
                    echo $json_string; 
                   
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
            resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos);
        }else {
            # code...
            ECHO "El formato ingresado $formatoResultado no se reconoce";
            ECHO "Esperaba aerolina=GU&vuelo=123&fecha=20210824&asiento=1A&nombre=JuanPerez&formato=NombreFormato";
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



?> 

