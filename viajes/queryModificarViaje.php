<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar viaje</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
  
</body>
</html>

<?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];
  $numeroVuelo = $_POST['numeroVuelo'];
  $matricula = $_POST['matricula'];
  $codigoViaje = $_POST['codigoViaje'];

  if(!isset($precio, $fecha, $numeroVuelo, $matricula, $codigoViaje)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarViaje = "UPDATE Viaje SET precio = $1, fecha = $2, numeroVuelo = $3, matricula = $4  WHERE codigoViaje = $5";

    pg_prepare($conexion,"prepareModificarViaje",$consultaModificarViaje) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarViaje",array(htmlspecialchars($precio),
    htmlspecialchars($fecha), 
    htmlspecialchars($numeroVuelo), 
    htmlspecialchars($matricula), 
    htmlspecialchars($codigoViaje)));
    
    if ($res) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos actualizados de viajes',
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
          title: 'Datos no se actualizaron de viajes',
          text: 'Los datos no se actualizaron de viajes',
          footer: '<a>Error los datos no se actualizaron.</a>'
    }).then(function() {
      window.location = '../index.php';
  });
    
    </script>";
    }
    pg_close($conexion);

  }
?>