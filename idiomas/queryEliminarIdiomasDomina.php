
    <?php 
    
    include '../conexion/conexion.php';

    //include '../datos/funcionesDatos.php';
    $obtenerCodigoIdioma = $_GET["codigoIdiomaEliminar"];

    /**
     * Evitamos inyeccion SQL */  
    $queryEliminarIdiomas = "DELETE FROM Idiomas WHERE  codigoIdioma=$1";

    pg_prepare($conexion,"prepareStatementEliminarIdiomas",$queryEliminarIdiomas) or die("Cannot prepare statement.");
    $res= pg_execute($conexion,"prepareStatementEliminarIdiomas",array($obtenerCodigoIdioma));
        
    
    
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