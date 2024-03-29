<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modificar idiomas</title>
    <script src="../js/validate.js"></script>


  </head>
  <body>
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
     
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/updated.png" alt="Idiomas" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/updated.png" alt="Idiomas" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom: 0rem! important; margin-bottom: 1rem! important;">Actualizar datos aeropuerto</h2>

        <form action="queryModificarAeropuerto.php" method="POST" class="row g-3 needs-validation" novalidate>       
        <div class="mb">
            <label for="lblCodigoAeropuerto">Codigo aeropuerto</label>
            <input type="text" class="form-control" name="txtCodigoAeropuertoModificar"  value="<?=$_GET['codigoAeropuertoModificar']?>" aria-describedby="ariaCodigoAeropuerto" placeholder="Codigo aeropuerto" required readonly><br>
            <div class="valid-feedback">
            Datos ingresados.
          </div>
        
        
        </div>

        <div class="mb">
            <label for="lblNombreAeropuerto">Nombre aeropuerto</label>
            <input type="text" class="form-control" name="txtNuevoNombreAeropuerto"  value="<?=$_GET['nuevoNombreAeropuerto']?>" aria-describedby="ariaAeropuerto" placeholder="Nuevo nombre aeropuerto" required><br>
            <div class="valid-feedback">
            Datos ingresados.
          </div>
        
        </div>	        
        
        <div class="mb">
            <label for="lblCiudadAeropuerto">Ciudad aeropuerto</label>
            <input type="text" class="form-control" name="txtNuevoCiudadAeropuerto"  value="<?=$_GET['nuevoCiudadAeropuerto']?>" aria-describedby="ariaCiudad" placeholder="Nueva ciudad aeropuerto" required><br>
            <div class="valid-feedback">
            Datos ingresados.
          </div>
        </div>	

        <div class="mb">
            <label for="lblPais">Pais:</label>
            <input type="text" class="form-control" name="txtNuevoPaisAeropuerto"  value="<?=$_GET['nuevoPaisAeropuerto']?>" aria-describedby="ariaCiudad" placeholder="Nuevo pais aeropuerto" required><br>
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
