<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos modificados boletos</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<body>


<?php

  include '../conexion/conexion.php';

  $numero = $_POST['numero'];
  $nombre = $_POST['nombre'];
  $fila = $_POST['fila'];
  $posicion = $_POST['posicion'];
  $codigo = $_POST['codigo'];

  if(!isset($numero,$nombre,$fila, $posicion,$codigo)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarBoletos = "UPDATE Boletos SET nombrePasajero = $1, fila = $2, posicion = $3, codigoViaje = $4  WHERE numeroBoleto = $5";

    pg_prepare($conexion,"prepareModificarBoletos",$consultaModificarBoletos) or die("Cannot prepare statement.");
  
    $resultado = pg_execute($conexion,"prepareModificarBoletos",array($nombre, $fila, $posicion, $codigo, $numero));
    
    if ($resultado) {
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
  }
?>


</body>
</html>
