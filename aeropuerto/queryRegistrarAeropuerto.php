<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de aeropuerto</title>
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
	$codigoAeropuerto= $_POST['txtNameCodigoAeropuerto'];
	$paisAeropuerto = $_POST['txtNamePais'];
	$datosAeropuerto= $_POST['txtNameAeropuerto'];
	$datosCiudad= $_POST['txtNameCiudad'];


	if(!isset($datosAeropuerto,$datosCiudad,$codigoAeropuerto,$paisAeropuerto)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el codigo del aeropuerto a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarAeropuerto = "SELECT * FROM Aeropuerto WHERE codigoAeropuerto=$1";
	
	pg_prepare($conexion,"prepareVerificarAeropuerto",$verificarAeropuerto) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarAeropuerto = pg_execute($conexion,"prepareVerificarAeropuerto",array($datosAeropuerto));

	if (pg_num_rows($ejecutarConsultaVerificarAeropuerto)) {
        alert("El Aeropuerto ya ha sido registrado");

	}else {

		$consulta  = sprintf("INSERT INTO Aeropuerto(codigoAeropuerto,nombreAeropuerto,ciudad,pais) VALUES('%s','%s','%s','%s');",
		pg_escape_string($codigoAeropuerto),
		pg_escape_string($datosAeropuerto),
		pg_escape_string($datosCiudad),
		pg_escape_string($paisAeropuerto)

		);
		$ejecutarConsulta = pg_query($conexion, $consulta);
	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados en aeropuerto',
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

	}

	}
?>