
<?php
  /**
   * Archivo necesario para obtener la variable $conexion necesario para conectarse a la base de datos.
   */
  include '../conexion/conexion.php';

  /**
   * Los nombres colocados en los POST corresponden al colocados en los inputs en la propieda
   * NAME del formulario en el archivo formularioModificarRuta.php
   */

  //$obtenerCodigoAerolinea = $_POST['txtCodigoAerolinea'];
  $obtenerNumeroVuelo = $_POST['txtNumeroVuelo'];
  $obtenerTiempoVuelo = $_POST['txtTiempoVuelo'];
  $obtenerHoraSalida = $_POST['txtHoraSalida'];
  $obtenerDistancia = $_POST['txtDistancia'];
  $obtenerAeropuertoOrigen = $_POST['txtAeropuertoOrigen'];
  $obtenerAeropuertoDestino = $_POST['txtAeropuertoDestino'];
 
  if(!isset($obtenerNumeroVuelo,$obtenerTiempoVuelo,$obtenerHoraSalida,$obtenerDistancia,$obtenerAeropuertoOrigen,$obtenerAeropuertoDestino)) {
    header('Location: ../index.php');
    //exit('Por favor ingresa el nombre de usuario y password.');
  }else {
    
    $consultaModificarRutas = "UPDATE Rutas SET  tiempoVuelo=$2, horaSalida=$3,distancia=$4,aeropuertoOrigen=$5, aeropuertoDestino =$6  WHERE numeroVuelo=$1";

    pg_prepare($conexion,"prepareModificarRutas",$consultaModificarRutas) or die("Cannot prepare statement.");
  
    $res = pg_execute($conexion,"prepareModificarRutas",array($obtenerNumeroVuelo,$obtenerTiempoVuelo,$obtenerHoraSalida,$obtenerDistancia,$obtenerAeropuertoOrigen,$obtenerAeropuertoDestino));
    
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
