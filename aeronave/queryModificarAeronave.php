<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos modificados aeronave</title>
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

  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $capacidadPasajeros = $_POST['pasajeros'];
  $capacidadPeso = $_POST['peso'];
  $matricula = $_POST['matricula'];

  if(!isset($marca,$modelo,$capacidadPasajeros, $capacidadPeso,$matricula)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {

    
    $consultaModificarAeronave = "UPDATE Aeronave SET marca = $1, modelo = $2, capacidadPasajeros = $3, capacidadPeso = $4  WHERE matricula = $5";

    pg_prepare($conexion,"prepareModificarAeronave",$consultaModificarAeronave) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarAeronave",array(htmlspecialchars($marca), 
    htmlspecialchars($modelo), htmlspecialchars($capacidadPasajeros), htmlspecialchars($capacidadPeso), 
    htmlspecialchars($matricula)));
    
    if ($res) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos actualizados',
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
          title: 'Datos no se actualizaron',
          text: 'Los datos no se actualizaron',
          footer: '<a>Error los datos no se actualizaron.</a>'
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
