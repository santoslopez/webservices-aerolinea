<!DOCTYPE html>
<html>
<head>
	<title>Registrar lengua maya</title>

	<!-- Sweet Alert2 personalizado para no usar mensajes javascript sin personalizar --->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  

	<!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
	<!--script src="../js/mensajesPersonalizados.js" type="text/javascript"></script-->

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
	
	$ejecutarConsultaVerificarAeropuerto = pg_execute($conexion,"prepareVerificarAeropuerto",array($datosAeropuerto));

	if (pg_num_rows($ejecutarConsultaVerificarAeropuerto)) {
        alert("El idioma esta en uso");

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
			alert ('datos actualizados');
			</script>";   
			header("Location: ../index.php");
	
			
		}else{
            alert ("Los datos no se guardaron");
	
	
		}
		//pg_close($conexion);

	}

	}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>