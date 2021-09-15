
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Modificar idiomas</title>

	<!-- Sweet Alert2 personalizado para no usar mensajes javascript sin personalizar --->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  

	<!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
	<!--script src="../js/mensajesPersonalizados.js" type="text/javascript"></script-->
  
</head>
  <body>
    <h1>Modificar idiomas</h1>

    <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  /**
   * txtNuevoNombreIdioma y txtCodigoIdioma: estos nombres son los que posse la propiedad
   * NAME del formulario en el archivo formularioModificarIdiomas.php
   */

  $obtenerNombreIdioma = $_POST['txtNuevoNombreIdioma'];
  $obtenerCodigoIdioma = $_POST['txtCodigoIdioma'];

  if(!isset($obtenerNombreIdioma,$obtenerCodigoIdioma)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarLenguas = "UPDATE Idiomas SET  nombreIdioma=$1 WHERE codigoIdioma=$2";

    pg_prepare($conexion,"prepareModificarIdiomasDomina",$consultaModificarLenguas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarIdiomasDomina",array($obtenerNombreIdioma,$obtenerCodigoIdioma));
    
    if ($res) {
      echo "<script>
      alert ('datos actualizados');
      </script>";   
      header("Location: ../index.php");
    
    } else {
      alert ("No actualizados");
    }
  }
?>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

</body>
</html>