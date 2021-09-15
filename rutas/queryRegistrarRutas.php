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
			alert ('datos actualizados');
			</script>";   
			header("Location: ../index.php");
			
		}else{
			echo "<script>
			alert ('los datos no se guardaron');
			</script>";   
	
		}
		//pg_close($conexion);

	}

	}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>