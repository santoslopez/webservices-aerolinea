<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de idiomas</title>
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
	//$obtenerCodigoIdioma= $_POST['txtNameCodigoIdioma'];
	$obtenerNombreIdioma= $_POST['txtNameIdiomas'];


	if(!isset($obtenerNombreIdioma)) {
		
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el idioma a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarIdiomas = "SELECT * FROM Idiomas WHERE nombreIdioma=$1";
	
	pg_prepare($conexion,"prepareVerificarIdiomasDomina",$verificarIdiomas) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarLenguas = pg_execute($conexion,"prepareVerificarIdiomasDomina",array($obtenerNombreIdioma));

	if (pg_num_rows($ejecutarConsultaVerificarLenguas)) {
	 
		echo "<script>  Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
			footer: '<a href=''>No se registraron los datos porque esta en uso.</a>'
	  });</script>";
		header("Location: ../index.php");


	}else {
		$consultaInsertarLeccion = "INSERT INTO Idiomas(nombreIdioma) VALUES ($1)";
		pg_prepare($conexion,"prepareInsertarIdiomas",$consultaInsertarLeccion) or die("Cannot prepare statement .");
		
		$ejecutarConsulta= pg_execute($conexion,"prepareInsertarIdiomas",array(htmlspecialchars($obtenerNombreIdioma)) );
	
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
