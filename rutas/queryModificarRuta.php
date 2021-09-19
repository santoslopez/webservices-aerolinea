<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar rutas</title>

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
   * Los nombres colocados en los POST corresponden al colocados en los inputs en la propieda
   * NAME del formulario en el archivo formularioModificarRuta.php
   */

  //$obtenerCodigoAerolinea = $_POST['txtCodigoAerolinea'];
  $obtenerNumeroVuelo = $_POST['txtNumeroVuelo'];
  $obtenerTiempoVuelo = $_POST['txtTiempoVuelo'];
  $obtenerHoraSalida = $_POST['txtHoraSalida'];
  $obtenerDistancia = $_POST['txtDistancia'];
  $obtenerAeropuertoOrigen = $_POST['txtAeropuertoOrigen'];
  $obtenerAeropuertoDestino = $_POST['txtAeropuertoDestino'];
 
  if(!isset($obtenerNumeroVuelo,$obtenerTiempoVuelo,$obtenerHoraSalida,$obtenerDistancia,$obtenerAeropuertoOrigen,$obtenerAeropuertoDestino)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    
    $consultaModificarRutas = "UPDATE Rutas SET  tiempoVuelo=$2, horaSalida=$3,distancia=$4,aeropuertoOrigen=$5, aeropuertoDestino =$6  WHERE numeroVuelo=$1";

    pg_prepare($conexion,"prepareModificarRutas",$consultaModificarRutas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarRutas",array($obtenerNumeroVuelo,$obtenerTiempoVuelo,$obtenerHoraSalida,$obtenerDistancia,$obtenerAeropuertoOrigen,$obtenerAeropuertoDestino));
    
    if ($res) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos actualizados en rutas',
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
          title: 'Datos no se actualizaron en rutas',
          text: 'Los datos no se actualizaron en rutas',
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

