<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tripulacion por Viaje</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>

   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
           
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/viajesempleados.png" alt="viajes empleados" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/viajesempleados.png" alt="Idiomas" width="48">
          </div>

          <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="margin-bottom: 0rem! important; ">Agregar tripulación</h2>

          <form action="queryRegistrarViajesEmpleados.php" method="POST" class="row g-3 needs-validation" novalidate>

            <div class="mb-4">
              <label for="labelNombreAeropuerto" class="form-label">Codigo del Viaje</label>
              <input type="text" class="form-control" aria-describedby="nameAeropuerto" name="codigoViaje" required value="<?=$_GET['codigoViaje']?>" readonly>
            </div>	

            <div class="mb-4">
              <label for="labelCodigoIdioma" class="form-label">Empleado</label>
              <?php
                      
                include "../conexion/conexion.php";
          
                $resultCuentas=pg_query($conexion, "SELECT codigoEmpleado, nombreDatos, puesto FROM Empleados");

                echo "<select name='codigoEmpleado' class='form-select form-select-sm mb-3' aria-label='.form-select-sm example' id='nombre'>\n";

                while ($row= pg_fetch_row($resultCuentas)) {
                    $codigoEmpleado = $row[0];
                    $nombreDatos = $row[1];
                    $puesto = $row[2];
                    echo "<option value='$codigoEmpleado'>$nombreDatos - $puesto</option>";
                }
                echo "</select>";
              ?>
                <div class="valid-feedback">
            Datos ingresados.
          </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Registrar tripulacion por vuelo</button>
              <div class="valid-feedback">
            Datos ingresados.
          </div>
            
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