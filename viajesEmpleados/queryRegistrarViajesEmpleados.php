<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tripulacion por viaje</title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>


<?php
	// importamos las variables globales para realizar la conexion y ejecutar las consultas para insertar datos.
	include '../conexion/conexion.php';
	
	$codigoViaje = $_POST['codigoViaje'];
	$codigoEmpleado = $_POST['codigoEmpleado'];


	if(!isset($codigoViaje,$codigoEmpleado)) {
		
		echo "hola $codigoViaje y $codigoEmpleado";
		//header('Location: ../index.php');
		//exit('Por favor ingresa el nombre de usuario y password.');
	}else {
	/*** Verificamos que el idioma a registrar no este registrado, si lo esta no se guardan los datos.*/
	$verificarViajes = "SELECT * FROM ViajeXEmpleado WHERE codigoEmpleado = $1 AND codigoViaje =$2";
	
	pg_prepare($conexion,"prepareVerificarViajeEmpleado",$verificarViajes) or die("Cannot prepare statement.");
	
	$ejecutarConsultaVerificarViajes = pg_execute($conexion,"prepareVerificarViajeEmpleado",array($codigoEmpleado, $codigoViaje));

	if (pg_num_rows($ejecutarConsultaVerificarViajes)) {
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

		$consulta  = sprintf("INSERT INTO ViajeXEmpleado (codigoEmpleado, codigoViaje) VALUES('%s','%s');",
		pg_escape_string($codigoEmpleado),
		pg_escape_string($codigoViaje)
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
		}else{
            alert ("Los datos no se guardaron");
	
		}

	}
    pg_close($conexion);

	}
?>


</body>
</html>
