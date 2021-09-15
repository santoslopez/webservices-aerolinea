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