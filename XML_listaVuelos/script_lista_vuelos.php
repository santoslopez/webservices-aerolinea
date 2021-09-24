<?php 

include '../conexion/conexion.php';    

$listadoVuelos ="select A.matricula,V.fecha,R.aeropuertoOrigen,R.aeropuertoDestino
,R.numeroVuelo,R.horaSalida,V.precio  FROM Rutas R,Aeronave A, Viaje V
WHERE V.matricula=A.matricula";
$ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoVuelos);

// verificamos que existen registros, sino no dibujamos la tabla
if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
    echo '<lista_vuelos>No hay informacion</lista_vuelos>';
}else{
    echo '<lista_vuelos>';
        while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
            $aerolinea = $row[0];
            $fecha = $row[1];
            $origen = $row[2];
            $destino = $row[3];
            $numero = $row[4];
            $hora= $row[5];
            $precio= $row[6];

            echo "\t<aerolinea>$aerolinea</aerolinea>\n";
            echo "\t<fecha>$fecha</fecha>\n";
            echo "\t<origen>$origen</origen>\n";
            echo "\t<destino>$destino</destino>\n";
            echo "\t<vuelo>\n";
            echo "\t\t<numero>$numero</numero>\n";
            echo "\t\t<hora>$hora</hora>\n";
            echo "\t\t<precio>$precio</precio>\n";
            echo "\t\t</vuelo>\n";
        }
    echo "</lista_vuelos>";
}
?> 

