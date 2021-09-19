<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	/*
		En el POST colocamos el nombre del NAME de cada input del formulario donde ingresamos los datos.
		El formulario corresponde al archivo formularioIdiomas.php
	*/
	$matricula = $_POST['matricula'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$capacidadPasajeros = $_POST['pasajeros'];
	$capacidadPeso = $_POST['peso'];


	if(!isset($matricula, $marca, $modelo, $capacidadPasajeros, $capacidadPeso)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el codigo del aeropuerto a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarAeropuerto = "SELECT * FROM Aeronave WHERE matricula = $1";
	
	pg_prepare($conexion,"prepareVerificarAeropuerto",$verificarAeropuerto) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarAeropuerto = pg_execute($conexion,"prepareVerificarAeropuerto",array($matricula));

	if (pg_num_rows($ejecutarConsultaVerificarAeropuerto)) {
        alert("El idioma esta en uso");

	}else {

		$consulta  = sprintf("INSERT INTO Aeronave (matricula, marca, modelo, capacidadPasajeros, capacidadPeso) VALUES('%s','%s','%s','%s','%s');",
		pg_escape_string($matricula),
		pg_escape_string($marca),
		pg_escape_string($modelo),
		pg_escape_string($capacidadPasajeros),
		pg_escape_string($capacidadPeso)

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