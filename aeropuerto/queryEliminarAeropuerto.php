
    <?php 
    
    include '../conexion/conexion.php';

    //include '../datos/funcionesDatos.php';
    $obtenerCodigoAeropuerto = $_GET["codigoAeropuertoEliminar"];

    /**
     * Evitamos inyeccion SQL */  
    $queryEliminarAeropuerto = "DELETE FROM Aeropuerto WHERE  codigoAeropuerto=$1";

    pg_prepare($conexion,"prepareStatementEliminarIdiomas",$queryEliminarAeropuerto) or die("Cannot prepare statement.");
    $res= pg_execute($conexion,"prepareStatementEliminarIdiomas",array($obtenerCodigoAeropuerto));
        
    
    
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
    
    //eliminarDatosFila("codigoLenguaEliminar",$queryEliminar,"prepareEliminarLenguas","La lengua se elimino","../perfil/index.php",$conexion);

    
    ?>
