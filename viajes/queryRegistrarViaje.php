<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrar viaje</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


</head>
<body>
	
</body>
</html>

<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	/*
		En el POST colocamos el nombre del NAME de cada input del formulario donde ingresamos los datos.
		El formulario corresponde al archivo formularioIdiomas.php
	*/
	$precio = $_POST['precio'];
	$fecha = $_POST['fecha'];
	$numeroVuelo = $_POST['numeroVuelo'];
	$matricula = $_POST['matricula'];

	if(!isset($precio, $fecha, $numeroVuelo, $matricula)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el viaje a registrar no este registrado, si lo esta no se guardan los datos.*/
	/* verificamos que  la fecha, el vuelo y la aeronave tiene que ser diferentes dias*/
	$verificarViaje = "SELECT * FROM Viaje WHERE fecha = $1 AND numeroVuelo = $2 AND matricula = $3";
	
	pg_prepare($conexion,"prepareVerificarViaje",$verificarViaje) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarViaje = pg_execute($conexion,"prepareVerificarViaje",array($fecha, $numeroVuelo, $matricula));

	if (pg_num_rows($ejecutarConsultaVerificarViaje)) {
        alert("El Vuelo ya ha sido programado");
	}else {

		$consulta  = sprintf("INSERT INTO Viaje (precio, fecha, numeroVuelo, matricula) VALUES('%s','%s','%s','%s');",
		pg_escape_string($precio),
		pg_escape_string($fecha),
		pg_escape_string($numeroVuelo),
		pg_escape_string($matricula)

		);

		$ejecutarConsulta = pg_query($conexion, $consulta);
	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados de viaje',
				text: 'Los datos se guardaron de viaje',
				footer: '<a>Datos guardados correctamente en rutas.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
			
		}else{
			echo "<script>
			Swal.fire({
				icon: 'error',
				title: 'Datos no guardados en viajes',
				text: 'Los datos no se guardaron en viajes',
				footer: '<a>Error los datos no se guardaron.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
		}
		//pg_close($conexion);

	}

	}
?>