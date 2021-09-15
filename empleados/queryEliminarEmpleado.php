
<!-- 
  Archivo eliminarLenguas.php 
  Corresponde al query para eliminar los datos.
-->

<!--?php 
  
	require_once("../perfil/sesionStart.php");
  rutaSesionDefault('Location: ../index.php');
?-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Datos eliminados</title>


    <!-- Sweet Alert2 personalizado para no usar mensajes javascript sin personalizar --->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
    <!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
    <script src="../js/mensajesPersonalizados.js" type="text/javascript"></script>

  </head>
  <body>
    <h1>Empleado eliminado</h1>
    
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>