<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="../css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Modificar boleto</title>
  </head>
  <body>
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">     
      <div class="row align-items-stretch">
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="boleto" src="../img/boletos.png" alt="Boletos" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          
        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom:0rem!important; margin-bottom:1rem!important;">Modificar boleto</h2>

        <form action="queryModificarBoletos.php" method="POST">

        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Número de Boleto</label>
				<input type="text" class="form-control"  min="1" aria-describedby="nameCodigoAeropuerto" name="numero" required value="<?=$_GET['numeroBoleto']?>" readonly>
		</div>
        
        <div class="mb-4">
				<label for="labelCodigoAeropuerto" class="form-label">Nombre del Pasajero</label>
				<input type="text" class="form-control"  minlength="1" maxlength="50" aria-describedby="nameCodigoAeropuerto" name="nombre" required value="<?=$_GET['nombrePasajero']?>">
		</div>

        <div class="mb-4">
				<label for="labelNombreAeropuerto" class="form-label">Fila</label>
				<input type="number" class="form-control" min="1" max="20" aria-describedby="nameAeropuerto" name="fila" required value="<?=$_GET['fila']?>">
			</div>	
      
      <div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Posición</label>
        <select name="posicion" class='form-select form-select-lg mb-3' aria-label='.form-select-lg example' required>
        <option value="">Seleccione</option>
        
        <?php
          $posicionregistrada = $_GET['posicion'];
          switch($posicionregistrada){
            case 'A': 
              echo "<option value='A' selected> A </option>";
              echo "<option value='B'> B </option>";
              echo "<option value='C'> C </option>";
              echo "<option value='D'> D </option>";
              break;
            case 'B': 
              echo "<option value='A'> A </option>";
              echo "<option value='B' selected> B </option>";
              echo "<option value='C'> C </option>";
              echo "<option value='D'> D </option>";
              break;
            case 'C': 
              echo "<option value='A'> A </option>";
              echo "<option value='B'> B </option>";
              echo "<option value='C' selected> C </option>";
              echo "<option value='D'> D </option>";
              break;
            case 'D': 
              echo "<option value='A'> A </option>";
              echo "<option value='B'> B </option>";
              echo "<option value='C'> C </option>";
              echo "<option value='D' selected> D </option>";
              break;
          }
        ?>
        </select>	
			</div>	

      <div class="mb-4">
				<label for="labelPaisAeropuerto" class="form-label">Codigo del Viaje</label>
        <?php
          include "../conexion/conexion.php";

          $resultViaje=pg_query($conexion, "SELECT codigoViaje FROM Viaje");

          echo "<select name='codigo' class='form-select form-select-lg mb-3' aria-label='.form-select-lg example'>\n";
          $codigoregistrado = $_GET['codigoViaje'];
          while ($row= pg_fetch_row($resultViaje)) {
              $codigo = $row[0];
              if($codigoregistrado == $codigo){
                echo "<option value='$codigo' selected='$codigo'> $codigo </option>";
              }else{
                echo "<option value='$codigo' id='opcion$codigo'>$codigo</option>";
              }

          }
          echo "</select>";
        ?>
        
			</div>
           
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Modificar boleto</button>
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