<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de aeronave</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<body>

<?php

	include '../conexion/conexion.php';

	$nombre = $_POST['nombre'];
	$fila = $_POST['fila'];
	$posicion = $_POST['posicion'];
	$codigo = $_POST['codigo'];


	if(!isset($nombre, $fila, $posicion, $codigo)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {

	$verificarBoleto = "SELECT * FROM Boletos WHERE nombrePasajero = $1 AND fila = $2 AND posicion = $3 AND codigoViaje = $4 ";
	
	pg_prepare($conexion,"prepareVerificarBoleto",$verificarBoleto) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarBoleto = pg_execute($conexion,"prepareVerificarBoleto",array($nombre, $fila, $posicion, $codigo));

	if (pg_num_rows($ejecutarConsultaVerificarBoleto)) {
		echo "<script>
		Swal.fire({
			icon: 'error',
			title: 'Datos no registrados',
			text: 'Los datos no se guardaron',
			footer: '<a>Datos no se guardaron. Ya esta en uso</a>'
	  }).then(function() {
		window.location = '../index.php';
	});
	  
	  </script>";
	}else {

		$consulta  = sprintf("INSERT INTO Boletos(nombrePasajero, fila, posicion, codigoViaje) VALUES('%s','%s','%s','%s');",
		pg_escape_string($nombre),
		pg_escape_string($fila),
		pg_escape_string($posicion),
		pg_escape_string($codigo)
		);
		$ejecutarConsulta = pg_query($conexion, $consulta);
	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados',
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


</body>
</html>
