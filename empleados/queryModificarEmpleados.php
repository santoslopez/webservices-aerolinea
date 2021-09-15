
  <?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  /**
   * txtNuevoNombreIdioma y txtCodigoIdioma: estos nombres son los que posse la propiedad
   * NAME del formulario en el archivo formularioModificarIdiomas.php
   */

  $codigoEmpleadoModificar = $_POST['txtCodigoEmpleadoModificar'];
  $nuevosDatosEmpleado = $_POST['txtNuevosDatosEmpleado'];
  $nuevoPuestoEmpleado = $_POST['txtNuevoPuestoEmpleado'];
  $nuevoHorasDeVuelo = $_POST['txtNuevoHorasDeVuelo'];
  $nuevoContactoEmergencia = $_POST['txtNuevoContactoDeEmergencia'];
  $nuevoTiempoEnEmpresa = $_POST['txtNuevoTiempoEnEmpresa'];
  $nacionalidad = $_POST['txtNuevoIdiomaDomina'];

  
  if(!isset($codigoEmpleadoModificar,$nuevosDatosEmpleado,$nuevoPuestoEmpleado,$nuevoHorasDeVuelo,$nuevoContactoEmergencia,$nuevoTiempoEnEmpresa,$nacionalidad)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    $consultaModificarLenguas = "UPDATE Empleados SET  nombreDatos=$1,puesto=$2,horasDeVuelo=$3,contactoDeEmergencia=$4,tiempoEnEmpresa=$5,nacionalidad=$6 WHERE codigoEmpleado=$7";

    pg_prepare($conexion,"prepareModificarEmpleados",$consultaModificarLenguas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarEmpleados",array($nuevosDatosEmpleado,
    $nuevoPuestoEmpleado,
    $nuevoHorasDeVuelo,
    $nuevoContactoEmergencia,
    $nuevoTiempoEnEmpresa,
    $nacionalidad,
    $codigoEmpleadoModificar
    )
  
  );
    
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