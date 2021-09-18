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