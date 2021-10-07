<?php 

include '../aerolineacc6/conexion/conexion.php';
include '../aerolineacc6/aerolinea/aerolinea.php';

$aerolineaA = $_GET['aerolina'];
$vuelo = $_GET['vuelo'];
$fechaA = $_GET['fecha'];
$formatoResultado = $_GET['formato'];

$year = substr($fechaA,0,4);
$month = substr($fechaA,4,2);
$day = substr($fechaA,6,2);

$fechaIng = "$year-$month-$day";

$listadoVuelos ="SELECT DISTINCT V.numeroVuelo, V.fecha, R.aeropuertoOrigen, R.aeropuertoDestino, A.marca, A.modelo 
                 FROM Viaje AS V, Rutas AS R, Aeronave AS A
                 WHERE V.numeroVuelo = R.numeroVuelo AND V.matricula = A.matricula AND V.numeroVuelo = $vuelo AND fecha = '$fechaIng' ";

//echo "consulta $listadoVuelos";

$infoVuelos  = "SELECT B.fila, B.posicion
                FROM Viaje AS V, Rutas AS R, Boletos AS B
                WHERE V.codigoViaje = B.codigoViaje AND V.numeroVuelo = R.numeroVuelo AND V.numeroVuelo = R.numeroVuelo AND V.numeroVuelo = $vuelo ORDER BY B.fila";


$ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoVuelos);
$consultaInfoVuelos = pg_query($conexion, $infoVuelos);

function resultadosJSON($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea){
    // verificamos que existen registros, sino no dibujamos la tabla
    $info = array();
    $asientos = array();
    $info['lista_asientos'] = array();

    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo json_encode(array('mensaje' => 'No existen vuelos'));
    }else{
        while ($row = pg_fetch_row($ejecutarConsultaObtenerInfo)) {
            $numero = $row[0];
            $fecha = $row[1];
            $origen = $row[2];
            $destino = $row[3];
            $marca= $row[4];
            $modelo = $row[5];
            
            if (!(pg_num_rows($consultaInfoVuelos))) {
                //echo json_encode('');
            }else{
                // son los asientos que estoy recibiendo OCUPADOS
                while ($row = pg_fetch_row($consultaInfoVuelos)) {
                    $asiento = array(
                        'fila' => $row[0],
                        'posicion' => $row[1]
                    );
                    array_push($asientos, $asiento);
                }
            } 
        } 
        // arreglo donde agrego TODOS los asietos
        $arrayposiciones = ['A', 'B','C','D'];
        $contfilas = 1;
        $asientosaux= array();
        $disponibles = array();
        /* 20 TIENE QUE SER EL VALOR  */
        while( $contfilas <= 20){   
            $contcol = 0;
            while($contcol < 4){
                $asientoA = array(
                    'fila' => $contfilas,
                    'posicion' => "$arrayposiciones[$contcol]"
                );
                array_push($asientosaux, $asientoA);
                $contcol++;
            }
            $contfilas ++;
        }

        error_reporting(0);

        $contpersonas = 0;
        $contasientos = 0;

        //compara los dos arreglos disponibles y TODOS
        while($contasientos < count($asientosaux)){
            //echo $contasientos."\n";
            
            if(($asientosaux[$contasientos] == $asientos[$contpersonas]) AND ($contpersonas < count($asientos))){
                //echo "ocupado\n";
                //como bloquear un boton disable
                $contpersonas++;
            }else{
                // dejar el boton normal 
                array_push($disponibles, $asientosaux[$contasientos]);
            }
            $contasientos++;
        }
        
        $fechaISO = str_replace('-','', $fecha);
        $avion = "$marca $modelo";
        $info['lista_asientos'] = array('aerolinea' => $aerolinea, "numero" => $numero, 'fecha' => $fechaISO, 'origen' => $origen, 'destino' => $destino, "avion" => $avion , 'asientos'=> $disponibles);

        header('Content-Type: application/json');
        echo json_encode($info);
    }
}

function resultadosXML($ejecutarConsultaObtenerInfo,$consultaInfoVuelos, $aerolinea){
    // verificamos que existen registros, sino no dibujamos la tabla
    $info = array();
    $asientos = array();
    $info['lista_asientos'] = array();

    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo json_encode(array('mensaje' => 'No existen vuelos'));
    }else{
        echo '<lista_asientos>';
        while ($row = pg_fetch_row($ejecutarConsultaObtenerInfo)) {
            $numero = $row[0];
            $fecha = $row[1];
            $origen = $row[2];
            $destino = $row[3];
            $marca= $row[4];
            $modelo = $row[5];
            $fechaISO = str_replace('-','',$fecha);

            echo "<aerolinea>$aerolinea</aerolinea>";
            echo "<numero>$numero</numero>";
            echo "<fecha>$fechaISO</fecha>";
            echo "<origen>$origen</origen>";
            echo "<destino>$destino</destino>";
            echo "<avion>$marca $modelo</avion>";
    
            if (!(pg_num_rows($consultaInfoVuelos))) {
                //echo json_encode('');
            }else{
                while ($row = pg_fetch_row($consultaInfoVuelos)) {
                    $asiento = array(
                        'fila' => $row[0],
                        'posicion' => $row[1]
                    );
                    array_push($asientos, $asiento);
                }
            } 
        } 
        
        $arrayposiciones = ['A', 'B','C','D'];
        $contfilas = 1;
        $asientosaux= array();
        $disponibles = array();

        while($contfilas <= 20){   
            $contcol = 0;
            while($contcol < 4){
                $asientoA = array(
                    'fila' => $contfilas,
                    'posicion' => "$arrayposiciones[$contcol]"
                );
                array_push($asientosaux, $asientoA);
                $contcol++;
            }
            $contfilas ++;
        }

        error_reporting(0);

        $contpersonas = 0;
        $contasientos = 0;

        while($contasientos < count($asientosaux)){
            //echo $contasientos."\n";
            
            if(($asientosaux[$contasientos] == $asientos[$contpersonas]) AND ($contpersonas < count($asientos))){
                //echo "ocupado\n";
                $contpersonas++;
            }else{
                array_push($disponibles, $asientosaux[$contasientos]);
                echo "<asiento>";
                echo "<fila>".$asientosaux[$contasientos]['fila']."</fila>";
                echo "<posicion>".$asientosaux[$contasientos]['posicion']."</posicion>";
                echo "</asiento>";
            }
            $contasientos++;
        }
        echo '</lista_asientos>';
    }
}

if($aerolinea == $aerolineaA){
    //Se permite que se ingrese 3 parametros o 4 con el formato
    if (($aerolinea && $vuelo && $fechaA)  || ($aerolinea && $vuelo && $fechaA && $formatoResultado) ) {
        
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
       echo "<p>script_lista_asientos?aerolina=GU&vuelo=123&fecha=20210824&formato=JSON</p>";
       echo "<p>script_lista_asientos?aerolina=GU&vuelo=123&fecha=20210824&formato=XML</p>";
       echo "<p>script_lista_asientos?aerolina=GU&vuelo=123&fecha=20210824 </p>";
    }
}

?> 