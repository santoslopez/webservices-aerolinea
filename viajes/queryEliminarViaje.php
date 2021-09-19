
<?php 

include '../conexion/conexion.php';

//include '../datos/funcionesDatos.php';
$codigoViaje = $_GET["codigoViaje"];

/**
 * Evitamos inyeccion SQL */  
$queryEliminarViaje = "DELETE FROM Viaje WHERE codigoViaje = $1";

pg_prepare($conexion,"prepareStatementEliminarViaje",$queryEliminarViaje) or die("Cannot prepare statement.");
$res = pg_execute($conexion,"prepareStatementEliminarViaje",array($codigoViaje));
    
if ($res) {
    echo "<script>
    alert ('datos eliminados');
    </script>";   
    header("Location: ../index.php");

} else {
    echo "<script>
    alert ('No se elimino');
    </script>";   
}    

?>
