<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Idiomas empleados</title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
	$obtenerNombreEmpleado= $_POST['txtNameIdiomasEmpleado'];
	
	
	$obtenerNombreIdioma= $_POST['txtNameCodigoIdioma'];


	if(!isset($obtenerNombreIdioma,$obtenerNombreEmpleado)) {
		
		echo "hola $obtenerNombreEmpleado y $obtenerNombreIdioma";
		//header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el idioma a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarIdiomas = "SELECT * FROM EmpleadoXIdioma WHERE codigoEmpleado=$1 AND codigoIdioma =$2";
	
	pg_prepare($conexion,"prepareVerificarIdiomasEmpleado",$verificarIdiomas) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarLenguas = pg_execute($conexion,"prepareVerificarIdiomasEmpleado",array($obtenerNombreEmpleado,
		$obtenerNombreIdioma
));

	if (pg_num_rows($ejecutarConsultaVerificarLenguas)) {
		//echo "<script>
		//alert ('No se actualizaron los datos porque estan en uso');
		//</script>";   
		echo "<script>  Swal.fire({
  			icon: 'error',
  			title: 'Oops...',
  			text: 'Something went wrong!',
  			footer: '<a href=''>No se actualizaron los datos porque esta en uso.</a>'
		});</script>";
		header("Location: ../index.php");


	}else {

		$consulta  = sprintf("INSERT INTO EmpleadoXIdioma(codigoEmpleado,codigoIdioma) VALUES('%s','%s');",
		pg_escape_string($obtenerNombreEmpleado),
		pg_escape_string($obtenerNombreIdioma)
	);
		$ejecutarConsulta = pg_query($conexion, $consulta);
		/*** Sino hay ningun error*/
		if ($ejecutarConsulta) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Datos registrados',
				text: 'Los datos se guardaron',
				footer: '<a href='#'>Datos guardados correctamente.</a>'
		  });</script>";
		  //sleep(2);
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


</body>
</html>
