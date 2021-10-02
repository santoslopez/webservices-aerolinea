<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- referencia al css del login -->
    <link rel="stylesheet" href="../css/login.css"/>

    <title>Registrar aeropuerto</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>

    <!--h1>Iniciar sesion</h1-->

   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
        
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/airplane.png" alt="Aeropuerto" width="80%" height="80%" style="margin-top:25%;margin-left:15%;margin-rigth:15%">

        </div>


        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/airplane.png" alt="Iniciar sesion" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5">Registrar aeropuerto</h2>

        <form action="queryRegistrarAeropuerto.php" method="POST" class="row g-3 needs-validation" novalidate>
        
        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Código aeropuerto</label>
				<input type="text" class="form-control"  minlength="1" maxlength="3" aria-describedby="nameCodigoAeropuerto" name="txtNameCodigoAeropuerto" required placeholder="Ingresa el codigo del aeropuerto" >
        <div class="valid-feedback">
          Datos ingresados.
        </div>
        
      </div>	

        <div class="mb-4">
				<label for="labelNombreAeropuerto" class="form-label">Nombre aeropuerto</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameAeropuerto" name="txtNameAeropuerto" required placeholder="Ingresa el nombre del aeropuerto" >
        <div class="valid-feedback">
           Nombre aeropuerto ingresado.
          </div>
        </div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Ciudad</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameCiudad" name="txtNameCiudad" required placeholder="Ingresa ciudad del aeropuerto" >
			
        <div class="valid-feedback">
            Nombre ciudad ingresado.
          </div>
      </div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Pais</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="namePais" name="txtNamePais" required placeholder="Ingresa pais del aeropuerto" >
        <div class="valid-feedback">
            Pais ingresados.
        </div>
      
      </div>	
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar Aeropuerto</button>
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