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
    <!--h1>Iniciar sesion</h1-->
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/languages.png" alt="Idiomas" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/languages.png" alt="Idiomas" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5">Actualizar datos idioma</h2>

        <form action="queryModificarIdiomas.php" method="POST" class="row g-3 needs-validation" novalidate>

        <div class="mb-4">
            <label for="lblCodigo">Codigo</label>
            <input type="number" class="form-control" name="txtCodigoIdioma"  value="<?=$_GET['codigoIdiomaModificar']?>" aria-describedby="ariaCodigoTipo" placeholder="Codigo idioma" readonly required>
        </div>

        <div class="mb-4">
            <label for="lblIdioma">Idioma</label>
            <input type="text"  minlength="1" maxlength="20" class="form-control" name="txtNuevoNombreIdioma"  value="<?=$_GET['nuevoNombreIdioma']?>" aria-describedby="emailSesion" placeholder="Nuevo nombre idioma" required>                
        
            <div class="valid-feedback">
              Datos ingresados.
            </div>
        </div>		        	
           
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div><br>

        <div class="d-grid">
          <a href="../index.php" class="btn btn-primary">Regresar</a>       
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