<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de empleado</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<body>

<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	/*
		En el POST colocamos el nombre del NAME de cada input del formulario donde ingresamos los datos.
		El formulario corresponde al archivo formularioRegistrarEmpleados.php
	*/

	$datosNombreApellidos= $_POST['txtNombreApellidos'];
	$datosPuesto = $_POST['txtPuesto'];
	$datosHorasVuelo = $_POST['txtHorasVuelo'];
	$datosContactosEmergencia = $_POST['txtContactosEmergencia'];
	$datosTiempoEnEmpresa = $_POST['txtTiempoEnEmpresa'];
	$datosNacionalidadEmpleado = $_POST['txtNacionalidadEmpleado'];



	if(!isset($datosNombreApellidos,$datosPuesto,$datosHorasVuelo,$datosContactosEmergencia,$datosTiempoEnEmpresa,$datosNacionalidadEmpleado)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {

		$consulta = "INSERT INTO Empleados(nombreDatos,puesto,horasDeVuelo,contactoDeEmergencia,tiempoEnEmpresa,nacionalidad) VALUES ($1,$2,$3,$4,$5,$6)";
		pg_prepare($conexion,"prepareInsertarEmpleados",$consulta) or die("Cannot prepare statement .");
	
		$ejecutarConsulta= pg_execute($conexion,"prepareInsertarEmpleados",
		array(
			htmlspecialchars($datosNombreApellidos),htmlspecialchars($datosPuesto),
			htmlspecialchars($datosHorasVuelo),htmlspecialchars($datosContactosEmergencia),
			htmlspecialchars($datosTiempoEnEmpresa),
			htmlspecialchars($datosNacionalidadEmpleado)
		) );

	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados en empleados',
				text: 'Los datos se guardaron',
				footer: '<a>Datos guardados correctamente.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
	
		}else{
			echo "<script>
			Swal.fire({
				icon: 'error',
				title: 'Datos no guardados',
				text: 'Los datos no se guardaron',
				footer: '<a>Error los datos no se guardaron.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
		
	
		}
		//pg_close($conexion);

	//}

	}
?>
	
</body>
</html>
