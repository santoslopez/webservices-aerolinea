<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrar rutas</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>

    <!--h1>Iniciar sesion</h1-->
  
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
        
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/ruta-aerea.png" alt="Empleados" width="60%" height="60%" style="margin-top:25%;margin-left:15%;margin-right:15%">

        </div>


        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/ruta-aerea.png" alt="Registrar rutas" width="48">
          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom: 0rem!important; padding-top: 0rem!important; margin-bottom: 1rem!important;">Registrar rutas</h2>

        <form action="queryRegistrarRutas.php" method="POST" class="row g-3 needs-validation" novalidate>
      
        <div class="mb-4">
				<label for="labelNumeroVuelo" class="form-label">Numero de Vuelo: </label>
				<input type="number" min="100" max="1000" class="form-control" aria-describedby="nameNumeroVuelo" name="txtNumeroVuelo" required placeholder="Ingresa el numero de vuelo">
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      
      </div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Tiempo de Vuelo</label>
				<input type="number" min="0" step="0.01" class="form-control" aria-describedby="nameTiempoVuelo" name="txtTiempoVuelo" required placeholder="Ingresa tiempo de vuelo" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>	
           
			<div class="mb-4">
				<label for="labelHoraSalida" class="form-label">Hora de Salida</label>
				<input type="time" class="form-control" aria-describedby="nameHoraSalida" name="txtHoraSalida" required placeholder="Ingresa el tiempo de salida" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>

      <div class="mb-4">
				<label for="labelDistancia" class="form-label">Distancia</label>
				<input type="number" min="0" class="form-control" aria-describedby="nameDistancia" name="txtDistancia" required placeholder="Ingresa la distancia" >
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

      while ($row= pg_fetch_row($resultCuentas)) {
          $codigo = $row[0];
          $nombre = $row[1];
          echo "<option value='$codigo' id='opcion$codigo' selected='$codigo'>$nombre</option>";
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

      echo "<select name='txtAeropuertoDestino' class='form-select form-select-sm mb-3' aria-label='.form-select-sm example'>\n";
      while ($row= pg_fetch_row($resultCuentas)) {
          $codigo = $row[0];
          $nombre = $row[1];
          echo "<option value='$codigo' id='opcion$codigo' selected='$codigo'>$nombre</option>";
      }
      echo "</select>";
      ?>			
        <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrar rutas</button>
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