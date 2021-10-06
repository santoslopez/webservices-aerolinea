<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminacion Tripulación por Viaje</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
    
<?php 
    
    include '../conexion/conexion.php';

    $codigoEmpleado = $_GET["codigoEmpleado"];
    $codigoViaje = $_GET["codigoViaje"];


    if(!isset($codigoEmpleado,$codigoViaje )) {
      header('Location: ../index.php');
      //exit('Por favor ingresa el nombre de usuario y password.');
    }else {
    /**
     * Evitamos inyeccion SQL */  
    $queryEliminarViajeEmpleado = "DELETE FROM ViajeXEmpleado WHERE codigoViaje = $1 AND codigoEmpleado = $2";

    pg_prepare($conexion,"prepareStatementEliminarIdiomas",$queryEliminarViajeEmpleado) or die("Cannot prepare statement.");
    $res= pg_execute($conexion,"prepareStatementEliminarIdiomas",array($codigoViaje,$codigoEmpleado));
        
    if ($res) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Datos eliminados de viajes por empleado',
            text: 'Eliminacion exitosa de la tripulación por viaje',
            footer: '<a>Datos eliminados correctamente.</a>'
      }).then(function() {
        window.location = '../index.php';
    });
      
      </script>";

    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Datos no eliminados en tripulación por viaje',
            text: 'Los datos no se eliminaron en tripulación por viaje',
            footer: '<a>Error los datos no se eliminaron.</a>'
      }).then(function() {
        window.location = '../index.php';
    });
      
      </script>";
    }
    pg_close($conexion);
   
    }

    ?>
</body>
</html>
