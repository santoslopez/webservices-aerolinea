
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar empleado</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<body>
    
</body>
</html>

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
        Swal.fire({
            icon: 'success',
            title: 'Datos eliminados de empleados',
            text: 'Eliminacion exitosa',
            footer: '<a>Datos eliminados correctamente.</a>'
      }).then(function() {
        window.location = '../index.php';
    });
      
      </script>";

    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Datos no eliminados',
            text: 'Los datos no se eliminaron',
            footer: '<a>Error los datos no se eliminaron.</a>'
      }).then(function() {
        window.location = '../index.php';
    });
      
      </script>";
    }    
    
    //eliminarDatosFila("codigoLenguaEliminar",$queryEliminar,"prepareEliminarLenguas","La lengua se elimino","../perfil/index.php",$conexion);

    
    ?>