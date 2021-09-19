    <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $capacidadPasajeros = $_POST['pasajeros'];
  $capacidadPeso = $_POST['peso'];
  $matricula = $_POST['matricula'];

  if(!isset($marca,$modelo,$capacidadPasajeros, $capacidadPeso,$matricula)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarAeronave = "UPDATE Aeronave SET marca = $1, modelo = $2, capacidadPasajeros = $3, capacidadPeso = $4  WHERE matricula = $5";

    pg_prepare($conexion,"prepareModificarAeronave",$consultaModificarAeronave) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarAeronave",array($marca, $modelo, $capacidadPasajeros, $capacidadPeso, $matricula));
    
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