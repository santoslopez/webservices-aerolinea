
    <?php 
    
    include '../conexion/conexion.php';

    //include '../datos/funcionesDatos.php';
    $obtenerCodigoRuta = $_GET["codigoRutaEliminar"];

    /**
     * Evitamos inyeccion SQL */  
    $queryEliminarRuta = "DELETE FROM Rutas WHERE  numeroVuelo=$1";

    pg_prepare($conexion,"prepareStatementEliminarIdiomas",$queryEliminarRuta) or die("Cannot prepare statement.");
    $res= pg_execute($conexion,"prepareStatementEliminarIdiomas",array($obtenerCodigoRuta));
        
    
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