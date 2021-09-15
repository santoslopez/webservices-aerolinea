    <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  /**
   * txtNuevoNombreAeropuerto,txtCodigoAeropuertoModificar y txtNuevoCiudadAeropuerto: estos nombres son los que posse la propiedad
   * NAME del formulario en el archivo formularioModificarAeropuerto.php
   */

  $obtenerNombreAeropuerto = $_POST['txtNuevoNombreAeropuerto'];
  $obtenerCodigoAeropuerto = $_POST['txtCodigoAeropuertoModificar'];
  $obtenerCiudadAeropuerto = $_POST['txtNuevoCiudadAeropuerto'];
  $obtenerPaisAeropuerto = $_POST['txtNuevoPaisAeropuerto'];



  if(!isset($obtenerNombreAeropuerto,$obtenerCiudadAeropuerto,$obtenerCodigoAeropuerto,$obtenerPaisAeropuerto)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarAeropuerto = "UPDATE Aeropuerto SET  nombreAeropuerto=$1,ciudad=$2,pais=$3 WHERE codigoAeropuerto=$4";

    pg_prepare($conexion,"prepareModificarIdiomasDomina",$consultaModificarAeropuerto) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarIdiomasDomina",array($obtenerNombreAeropuerto,$obtenerCiudadAeropuerto,$obtenerPaisAeropuerto,$obtenerCodigoAeropuerto));
    
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