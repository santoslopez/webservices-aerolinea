<?php
    $user = "postgres";
    $bd = "aerolinea";
    $host = "localhost";
    $passUser = "";
    $puerto = "5432";

    $conexion = pg_connect("host=$host port=$puerto dbname=$bd user=$user");

    if (!$conexion) {
        # code...
        echo "No se pudo establecer la conexion...";
    }

?>