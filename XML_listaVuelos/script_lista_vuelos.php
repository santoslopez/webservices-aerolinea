<?php 

include '../conexion/conexion.php';

$origenA = $_GET['origen'];
$destinoA = $_GET['destino'];
$fechaA = $_GET['fecha'];

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
?> 

