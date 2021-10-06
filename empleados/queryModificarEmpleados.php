<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar empleados</title>
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

  $codigoEmpleadoModificar = $_POST['txtCodigoEmpleadoModificar'];
  $nuevosDatosEmpleado = $_POST['txtNuevosDatosEmpleado'];
  $nuevoPuestoEmpleado = $_POST['txtNuevoPuestoEmpleado'];
  $nuevoHorasDeVuelo = $_POST['txtNuevoHorasDeVuelo'];
  $nuevoContactoEmergencia = $_POST['txtNuevoContactoDeEmergencia'];
  $nuevoTiempoEnEmpresa = $_POST['txtNuevoTiempoEnEmpresa'];
  $nacionalidad = $_POST['txtNuevoIdiomaDomina'];

  
  if(!isset($codigoEmpleadoModificar,$nuevosDatosEmpleado,$nuevoPuestoEmpleado,$nuevoHorasDeVuelo,$nuevoContactoEmergencia,$nuevoTiempoEnEmpresa,$nacionalidad)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarLenguas = "UPDATE Empleados SET  nombreDatos=$1,puesto=$2,horasDeVuelo=$3,contactoDeEmergencia=$4,tiempoEnEmpresa=$5,nacionalidad=$6 WHERE codigoEmpleado=$7";

    pg_prepare($conexion,"prepareModificarEmpleados",$consultaModificarLenguas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarEmpleados",array(
      htmlspecialchars($nuevosDatosEmpleado),
      htmlspecialchars($nuevoPuestoEmpleado),
      htmlspecialchars($nuevoHorasDeVuelo),
      htmlspecialchars($nuevoContactoEmergencia),
      htmlspecialchars($nuevoTiempoEnEmpresa),
      htmlspecialchars($nacionalidad),
      htmlspecialchars($codigoEmpleadoModificar)
    )
  
  );
    
    if ($res) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos actualizados en empleados',
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
          title: 'Datos no se actualizaron en empleados',
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
