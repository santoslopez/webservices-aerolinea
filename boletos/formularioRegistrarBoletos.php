<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Registrar boleto</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">     
      <div class="row align-items-stretch">
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="boleto" src="../img/boletos.png" alt="Boletos" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          
        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom:0rem!important; margin-bottom:1rem!important;">Registrar boleto</h2>

        <form action="queryRegistrarBoletos.php" method="POST" class="row g-3 needs-validation" novalidate>
        
        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Nombre del Pasajero</label>
				<input type="text" class="form-control"  minlength="1" maxlength="50" aria-describedby="nameCodigoAeropuerto" name="nombre" required placeholder="Ingresa el nombre del pasajero" >
        <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>	

        <div class="mb-4">
				<label for="labelNombreAeropuerto" class="form-label">Fila</label>
				<input type="number" class="form-control" min="1" max="20" aria-describedby="nameAeropuerto" name="fila" required placeholder="Ingresa la fila de asiento" >
        <div class="valid-feedback">
            Datos ingresados.
          </div>
    
      </div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Posición</label>
        <select name="posicion" class='form-select form-select-lg mb-3' aria-label='.form-select-lg example' required>
          <option value="" selected>Seleccione</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        <div class="valid-feedback">
            Datos ingresados.
          </div>			
      </div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Codigo del Viaje</label>
        <?php
          include "../conexion/conexion.php";

          $resultViaje=pg_query($conexion, "SELECT codigoViaje FROM Viaje");

          echo "<select name='codigo' class='form-select form-select-lg mb-3' aria-label='.form-select-lg example'>\n";

          while ($row= pg_fetch_row($resultViaje)) {
              $codigo = $row[0];
              echo "<option value='$codigo' id='opcion$codigo' selected='$codigo'>$codigo</option>";
          }
          echo "</select>";
        ?>
			   <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar boleto</button>
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