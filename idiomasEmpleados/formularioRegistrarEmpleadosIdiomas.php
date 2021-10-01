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

    <title>Idiomas que domina empleado</title>
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

        <form action="queryRegistrarIdiomasEmpleados.php" method="POST">

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
			  
          </div>

        <div class="mb-4">
				  <label for="labelNombreIdioma" class="form-label"> <strong>Empleado:</strong> <?=$_GET['nombreEmpleado']?></label>

				  <input type="text" style="display:none" class="form-control" minlength="1" maxlength="20" value="<?=$_GET['codigoEmpleadoDatos']?>" aria-describedby="nameIdiomasEmpleados" name="txtNameIdiomasEmpleado" required placeholder="Ingresa el idioma">
          
          <!--?php
      
      include "../conexion/conexion.php";
      
      $resultListaEmpleados=pg_query($conexion, "SELECT codigoEmpleado,nombreDatos FROM Empleados");

      echo "<select name='txtNameEmpleado'>\n";

      while ($row= pg_fetch_row($resultListaEmpleados)) {
          $codigo = $row[0];
          $nombre = $row[1];
          echo "<option value='$codigo' id='opcion$codigo' selected='$codigo'>$nombre</option>";
      }
      echo "</select>";
      ?-->
      
        
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

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </body>
</html>