<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Modificar Viaje</title>
  </head>
  <body>
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">     
      <div class="row align-items-stretch">
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/viaje.png" alt="Aeronave" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          
          <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom:0rem!important; margin-bottom:1rem!important;">Modificar Viaje</h2>

          <form action="queryModificarViaje.php" method="POST">
            
            <div class="mb-4">      
                <label for="labelNombreAeropuerto" class="form-label">Codigo del Viaje</label>
                <input type="text" class="form-control" aria-describedby="nameAeropuerto" name="codigoViaje" value="<?=$_GET['codigoViaje']?>" readonly>
            </div>


        <div class="mb-4">
				  <label for="labelNombreAeropuerto" class="form-label">Precio</label>
				  <input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="nameAeropuerto" name="precio" required value="<?=$_GET['precio']?>" >
			  </div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Fecha</label>
				<input type="date" class="form-control" aria-describedby="nameCiudad" name="fecha" required value="<?=$_GET['fecha']?>">
			</div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Numero de Vuelo</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="namePais" name="numeroVuelo" required value="<?=$_GET['numeroVuelo']?>">
			</div>

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Matricula</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="namePais" name="matricula" required value="<?=$_GET['matricula']?>">
			</div>	
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Modificar Viaje</button>
      </div><br>

        <div class="d-grid">
          <a href="../index.php" class="btn btn-primary" style="margin-bottom: 15px;">Regresar</a>       
        </div>

        </form>    
   
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </body>
</html>