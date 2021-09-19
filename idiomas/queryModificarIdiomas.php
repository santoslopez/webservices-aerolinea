<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar idiomas</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<body>

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
			Swal.fire({
				icon: 'success',
				title: 'Datos actualizados en idiomas',
				text: 'Los datos se actualizaron',
				footer: '<a>Datos actualizados correctamente.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
    
    } else {
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Datos no se actualizaron en idiomas',
          text: 'Los datos no se actualizaron',
          footer: '<a>Error los datos no se actualizaron.</a>'
    }).then(function() {
      window.location = '../index.php';
  });
    
    </script>";
    }
  }
?>

</body>
</html>

