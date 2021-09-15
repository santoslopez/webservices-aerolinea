    <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  /**
   * txtNuevoNombreIdioma y txtCodigoIdioma: estos nombres son los que posse la propiedad
   * NAME del formulario en el archivo formularioModificarIdiomas.php
   */

  $obtenerNombreIdioma = $_POST['txtNuevoNombreIdioma'];
  $obtenerCodigoIdioma = $_POST['txtCodigoIdioma'];

  if(!isset($obtenerNombreIdioma,$obtenerCodigoIdioma)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarLenguas = "UPDATE Idiomas SET  nombreIdioma=$1 WHERE codigoIdioma=$2";

    pg_prepare($conexion,"prepareModificarIdiomasDomina",$consultaModificarLenguas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarIdiomasDomina",array($obtenerNombreIdioma,$obtenerCodigoIdioma));
    
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