<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- referencia al css del login -->
    <link rel="stylesheet" href="../css/login.css"/>

    <title>Registrar aeropuerto</title>
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

        <form action="queryRegistrarAeropuerto.php" method="POST">
        
        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Código aeropuerto</label>
				<input type="text" class="form-control"  minlength="1" maxlength="3" aria-describedby="nameCodigoAeropuerto" name="txtNameCodigoAeropuerto" required placeholder="Ingresa el codigo del aeropuerto" >
			</div>	

        <div class="mb-4">
				<label for="labelNombreAeropuerto" class="form-label">Nombre aeropuerto</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameAeropuerto" name="txtNameAeropuerto" required placeholder="Ingresa el nombre del aeropuerto" >
			</div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Ciudad</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameCiudad" name="txtNameCiudad" required placeholder="Ingresa ciudad del aeropuerto" >
			</div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Pais</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="namePais" name="txtNamePais" required placeholder="Ingresa pais del aeropuerto" >
			</div>	
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar idiomas</button>
      </div><br>
      
      <div class="d-grid">
          <a href="../index.php" class="btn btn-primary">Regresar atrás</a>       
      </div>

        </form>        
   
        </div>
      </div>


    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </body>
</html>