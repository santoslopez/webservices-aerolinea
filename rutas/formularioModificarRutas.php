<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modificar RUTAS</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>
    <!--h1>Iniciar sesion</h1-->
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/updated.png" alt="Idiomas" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/updated.png" alt="Idiomas" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom: 0rem! important;">Actualizar datos ruta</h2>

		<form action="queryModificarRuta.php" method="POST" class="row g-3 needs-validation" novalidate>
        
        	<div class="mb-4">
				<label for="labelNumeroVuelo" class="form-label">Numero de Vuelo</label>
				<input type="number" readonly class="form-control" aria-describedby="nameNumeroVuelo" value="<?=$_GET['nuevoNumeroVuelo']?>"  name="txtNumeroVuelo" required placeholder="Ingresa el numero de vuelo" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>	
      
      		<div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Tiempo de Vuelo</label>
				<input type="number" class="form-control" aria-describedby="nameTiempoVuelo" value="<?=$_GET['nuevoTiempoVuelo']?>"  name="txtTiempoVuelo" required placeholder="Ingresa tiempo de vuelo" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>	
           
			<div class="mb-4">
				<label for="labelHoraSalida" class="form-label">Hora de Salida</label>
				<input type="time" class="form-control" aria-describedby="nameHoraSalida" value="<?=$_GET['nuevoHoraSalida']?>" name="txtHoraSalida" required placeholder="Ingresa el tiempo de salida" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>

          	<div class="mb-4">
				<label for="labelDistancia" class="form-label">Distancia</label>
				<input type="number" class="form-control" aria-describedby="nameDistancia" value="<?=$_GET['nuevoValorDistancia']?>" name="txtDistancia" required placeholder="Ingresa la distancia" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>


      <div class="mb-4">
				<label for="labelAeropuertoOrigen" class="form-label">Aeropuerto Origen</label>
				<!--input type="text" class="form-control" aria-describedby="nameAeropuertoOrigen"  required placeholder="Ingresa aeropuerto origen" -->
			
      <?php
      
        include "../conexion/conexion.php";
        $resultCuentas=pg_query($conexion, "SELECT codigoAeropuerto,nombreAeropuerto FROM Aeropuerto");

        echo "<select name='txtAeropuertoOrigen' class='form-select form-select-sm mb-3' aria-label='.form-select-sm example'> \n";
        $codigoext = $_GET["nuevoAeropuertoOrigen"];

        while ($row= pg_fetch_row($resultCuentas)) {
            $codigo = $row[0];
            $nombre = $row[1];
            if($codigo == $codigoext){
              echo "<option value='$codigo' selected='$codigo'> $nombre </option>";
            }else{
              echo "<option value='$codigo'> $nombre </option>";
            }
        }
        echo "</select>";
      ?>
        <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>


      <div class="mb-4">
				<label for="labelAeropuertoDestino" class="form-label">Aeropuerto Destino</label>
				<!--input type="text" class="form-control" aria-describedby="nameAeropuertoDestino" name="txtAeropuertoDestino" required placeholder="Ingresa aeropuerto destino" -->
			
      <?php
      
        include "../conexion/conexion.php";
        $resultCuentas=pg_query($conexion, "SELECT codigoAeropuerto,nombreAeropuerto FROM Aeropuerto");

        echo "<select name='txtAeropuertoDestino' class='form-select form-select-sm mb-3' aria-label='.form-select-sm example'> \n";
        $codigoext = $_GET["nuevoAeropuertoDestino"];

        while ($row= pg_fetch_row($resultCuentas)) {
            $codigo = $row[0];
            $nombre = $row[1];

            if($codigo == $codigoext){
              echo "<option value='$codigo' selected='$codigo'> $nombre </option>";
            }else{
              echo "<option value='$codigo'> $nombre </option>";
            }
        }
        echo "</select>";
    ?>		
        <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>
	
           
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div><br>

        <div class="d-grid">
          <a href="../index.php" class="btn btn-primary" style="margin-bottom: 15px;">Regresar</a>       
        </div>

      </form> 
   
      </div>
    </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  validar();
</script>
    </body>
</html>