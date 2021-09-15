<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	/*
		En el POST colocamos el nombre del NAME de cada input del formulario donde ingresamos los datos.
		El formulario corresponde al archivo formularioRegistrarEmpleados.php
	*/

	$datosNombreApellidos= $_POST['txtNombreApellidos'];
	$datosPuesto = $_POST['txtPuesto'];
	$datosHorasVuelo = $_POST['txtHorasVuelo'];
	$datosContactosEmergencia = $_POST['txtContactosEmergencia'];
	$datosTiempoEnEmpresa = $_POST['txtTiempoEnEmpresa'];
	$datosNacionalidadEmpleado = $_POST['txtNacionalidadEmpleado'];



	if(!isset($datosNombreApellidos,$datosPuesto,$datosHorasVuelo,$datosContactosEmergencia,$datosTiempoEnEmpresa,$datosNacionalidadEmpleado)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el idioma a registrar no este registrado, si lo esta no se guardan los datos.*/
	/*$verificarLenguas = "SELECT * FROM Empleados WHERE nombreIdioma=$1";
	
	pg_prepare($conexion,"prepareVerificarIdiomasDomina",$verificarLenguas) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarLenguas = pg_execute($conexion,"prepareVerificarIdiomasDomina",array($datosLenguasRegistro));

	if (pg_num_rows($ejecutarConsultaVerificarLenguas)) {
        alert("El idioma esta en uso");
		
	}else {*/

		$consulta  = sprintf("INSERT INTO Empleados(nombreDatos,puesto,horasDeVuelo,contactoDeEmergencia,tiempoEnEmpresa,nacionalidad) VALUES('%s','%s','%s','%s','%s','%s');",
		pg_escape_string($datosNombreApellidos),
		pg_escape_string($datosPuesto),
		pg_escape_string($datosHorasVuelo),
		pg_escape_string($datosContactosEmergencia),
		pg_escape_string($datosTiempoEnEmpresa),
		pg_escape_string($datosNacionalidadEmpleado)
	
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

	//}

	}
?>
