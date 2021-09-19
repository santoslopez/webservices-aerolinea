    <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];
  $numeroVuelo = $_POST['numeroVuelo'];
  $matricula = $_POST['matricula'];
  $codigoViaje = $_POST['codigoViaje'];

  if(!isset($precio, $fecha, $numeroVuelo, $matricula, $codigoViaje)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarViaje = "UPDATE Viaje SET precio = $1, fecha = $2, numeroVuelo = $3, matricula = $4  WHERE codigoViaje = $5";

    pg_prepare($conexion,"prepareModificarViaje",$consultaModificarViaje) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarViaje",array($precio, $fecha, $numeroVuelo, $matricula, $codigoViaje));
    
    if ($res) {
      echo "<script>
      alert ('datos actualizados');
      </script>";   
      header("Location: ../index.php");
    
    } else {
      alert ("No actualizados");
    }
  }
?>