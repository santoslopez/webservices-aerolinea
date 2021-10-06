<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- referencia al css del login -->
    <link rel="stylesheet" href="../css/login.css"/>

    <title>Idiomas que domina empleado</title>
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

        <h2 class="fw-bold text-center pt-5 mb-5 py-5">Idiomas que domina empleado</h2>

        <form action="queryRegistrarIdiomasEmpleados.php" method="POST" class="row g-3 needs-validation" novalidate>
      

          <div class="mb-4">
				    <label for="labelCodigoIdioma" class="form-label">Idioma</label>
				    <!--input type="text" class="form-control" aria-describedby="nameCodigoIdiomasEmpleado" minlength="1" maxlength="3" name="txtNameCodigoIdiomaEmpleado" required placeholder="Ingresa el codido del idioma"-->
            <?php
      
              include "../conexion/conexion.php";
        
              $resultCuentas=pg_query($conexion, "SELECT codigoIdioma,nombreIdioma FROM Idiomas");

              echo "<select name='txtNameCodigoIdioma'>\n";

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
				  <label for="labelNombreIdioma" class="form-label"> <strong>Empleado:</strong> <?=$_GET['nombreEmpleado']?></label>

				  <input type="text" style="display:none" class="form-control" minlength="1" maxlength="20" value="<?=$_GET['codigoEmpleadoDatos']?>" aria-describedby="nameIdiomasEmpleados" name="txtNameIdiomasEmpleado" required placeholder="Ingresa el idioma">
          
          <div class="valid-feedback">
            Datos ingresados.
          </div>
      
        
        </div>			
           
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Registrar idiomas empleado</button>
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