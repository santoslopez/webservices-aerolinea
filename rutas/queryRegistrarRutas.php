<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrar rutas</title>
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
	
	$numeroVuelo= $_POST['txtNumeroVuelo'];
	$tiempoVuelo= $_POST['txtTiempoVuelo'];
	$horaSalida= $_POST['txtHoraSalida'];
	$distancia = $_POST['txtDistancia'];
	$aeropuertoOrigen = $_POST['txtAeropuertoOrigen'];
	$aeropuertoDestino = $_POST['txtAeropuertoDestino'];

	
	

	if(!isset($tiempoVuelo,$horaSalida,$distancia,$aeropuertoOrigen,$aeropuertoDestino )) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que ruta a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarAeropuerto = "SELECT * FROM Rutas WHERE numeroVuelo=$1";
	
	pg_prepare($conexion,"prepareVerificarRuta",$verificarAeropuerto) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarRuta = pg_execute($conexion,"prepareVerificarRuta",array($numeroVuelo));

	if (pg_num_rows($ejecutarConsultaVerificarRuta)) {
		echo "<script>
		alert ('No se guardaron los datos estan en uso');
		</script>";   

	}else {

		$consulta  = sprintf("INSERT INTO Rutas(numeroVuelo,tiempoVuelo,horaSalida,distancia,aeropuertoOrigen,aeropuertoDestino) VALUES('%s','%s','%s','%s','%s','%s');",
		pg_escape_string($numeroVuelo),
		pg_escape_string($tiempoVuelo),
		pg_escape_string($horaSalida),
		pg_escape_string($distancia),
		pg_escape_string($aeropuertoOrigen),
		pg_escape_string($aeropuertoDestino));
		$ejecutarConsulta = pg_query($conexion, $consulta);
	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados',
				text: 'Los datos se guardaron de rutas',
				footer: '<a>Datos guardados correctamente en rutas.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
			
		}else{
			echo "<script>
			Swal.fire({
				icon: 'error',
				title: 'Datos no guardados en rutas',
				text: 'Los datos no se guardaron en rutas',
				footer: '<a>Error los datos no se guardaron.</a>'
		  }).then(function() {
			window.location = '../index.php';
		});
		  
		  </script>";
	
		}
		//pg_close($conexion);

	}

	pg_close($conexion);


	}
?>