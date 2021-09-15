    
    <?php 
    
    include '../conexion/conexion.php';

    //include '../datos/funcionesDatos.php';
    $obtenerCodigoEmpleadoEliminar = $_GET["codigoEmpleadoEliminar"];

    /**
     * Evitamos inyeccion SQL */  
    $queryEliminarIdiomas = "DELETE FROM Empleados WHERE  codigoEmpleado=$1";

    pg_prepare($conexion,"prepareStatementEliminarEmpleado",$queryEliminarIdiomas) or die("Cannot prepare statement.");
    $res= pg_execute($conexion,"prepareStatementEliminarEmpleado",array($obtenerCodigoEmpleadoEliminar ));
        
    
    
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