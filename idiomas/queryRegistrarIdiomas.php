<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	/*
		En el POST colocamos el nombre del NAME de cada input del formulario donde ingresamos los datos.
		El formulario corresponde al archivo formularioIdiomas.php
	*/
	$obtenerCodigoIdioma= $_POST['txtNameCodigoIdioma'];
	$obtenerNombreIdioma= $_POST['txtNameIdiomas'];


	if(!isset($obtenerCodigoIdioma,$obtenerNombreIdioma)) {
		header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el idioma a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarIdiomas = "SELECT * FROM Idiomas WHERE codigoIdioma=$1 AND nombreIdioma=$2";
	
	pg_prepare($conexion,"prepareVerificarIdiomasDomina",$verificarIdiomas) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarLenguas = pg_execute($conexion,"prepareVerificarIdiomasDomina",array($obtenerCodigoIdioma,
		$obtenerNombreIdioma
));

	if (pg_num_rows($ejecutarConsultaVerificarLenguas)) {
		echo "<script>
		alert ('No se actualizaron los datos porque estan en uso');
		</script>";   
		header("Location: ../index.php");


	}else {

		$consulta  = sprintf("INSERT INTO Idiomas(codigoIdioma,nombreIdioma) VALUES('%s','%s');",
		pg_escape_string($obtenerCodigoIdioma),
		pg_escape_string($obtenerNombreIdioma));
		$ejecutarConsulta = pg_query($conexion, $consulta);
	
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			alert ('datos actualizados');
			</script>";   
			header("Location: ../index.php");
			//echo "<script>
			//		mensajeRegistrarDatos('La lengua se registro correctamente','Datos registrados','success','../perfil/index.php');
			//	 </script>
			//";
		}else{
            alert ("Los datos no se guardaron");
			//echo "<script>
			//		mensajeRegistrarDatos('Los datos no se registraron','ERROR','error','../perfil/index.php');
			//	 </script>
			//";
	
		}
		//pg_close($conexion);

	}

	}
?>
