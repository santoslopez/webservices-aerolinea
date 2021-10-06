<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrar Aerolinea</title>

    <script src="../js/validate.js"></script>

  </head>
  <body>
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">     
      <div class="row align-items-stretch">
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/nave.png" alt="Aeronave" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom:0rem!important; margin-bottom:1rem!important;">Registrar Aeronave</h2>

        <form action="queryRegistrarAeronave.php" method="POST" class="row g-3 needs-validation" novalidate>
        
        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Matrícula</label>
				<input type="text" class="form-control"  minlength="1" maxlength="2" aria-describedby="nameCodigoAeropuerto" name="matricula" required placeholder="Ingresa matrícula de la aeronave" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>	

        <div class="mb-4">
				<label for="labelNombreAeropuerto" class="form-label">Marca</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameAeropuerto" name="marca" required placeholder="Ingresa la marca de la aeronave" >
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Modelo</label>
				<input type="number" class="form-control" min="1900" max="2023" aria-describedby="nameCiudad" name="modelo" required placeholder="Ingresa el modelo del aeronave">
			  <div class="valid-feedback">
            Modelo.
          </div>
      
      </div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Capacidad de Pasajeros</label>
				<input type="number" class="form-control" min="1" minlength="1" maxlength="50" aria-describedby="namePais" name="pasajeros" required placeholder="Ingresa la capacidad de pasajeros de la aeronave">
        <div class="valid-feedback">
            Capacidad de pasajeros.
          </div>
    
      </div>

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Capacidad de Peso</label>
				<input type="number" step="0.01" min="0.01" class="form-control" minlength="1" maxlength="10" aria-describedby="namePais" name="peso" required placeholder="Ingresa la capacidad de peso de la aeronave">
			  <div class="valid-feedback">
            Capacidad de peso.
          </div>
      
      </div>	
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar Aeronave</button>
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