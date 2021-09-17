
<?php 

include '../conexion/conexion.php';

//include '../datos/funcionesDatos.php';
$matricula = $_GET["matricula"];

/**
 * Evitamos inyeccion SQL */  
$queryEliminarAeropuerto = "DELETE FROM Aeronave WHERE matricula=$1";

pg_prepare($conexion,"prepareStatementEliminarAeronave",$queryEliminarAeropuerto) or die("Cannot prepare statement.");
$res = pg_execute($conexion,"prepareStatementEliminarAeronave",array($matricula));
    
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
