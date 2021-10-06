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
	
	$ejecutarConsultaVerificarAeropuerto = pg_execute($conexion,"prepareVerificarAeropuerto",array($codigoAeropuerto));

	if (pg_num_rows($ejecutarConsultaVerificarAeropuerto)) {
        echo "<script>
			Swal.fire({
				icon: 'error',
				title: 'El codigo del aeropuerto ya existe',
				text: 'Los datos de aeropuerto no se guardaron',
				footer: '<a>Los datos no se guardaron.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  </script>";
	}else {

		$consulta = "INSERT INTO Aeropuerto(codigoAeropuerto,nombreAeropuerto,ciudad,pais) VALUES ($1,$2,$3,$4)";
		pg_prepare($conexion,"prepareInsertarAeropuerto",$consulta) or die("Cannot prepare statement .");
	
		$ejecutarConsulta= pg_execute($conexion,"prepareInsertarAeropuerto",
		array(
			htmlspecialchars($codigoAeropuerto),htmlspecialchars($datosAeropuerto),
			htmlspecialchars($datosCiudad),htmlspecialchars($paisAeropuerto)
		));
	
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
				title: 'Caracteres no permitidos',
				text: 'Los datos no se guardaron',
				footer: '<a>Los datos no son permitidos (JavaScript, caracteres extraños)</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
	
		}
		//pg_close($conexion);

	}

	}
?>


</body>
</html>
