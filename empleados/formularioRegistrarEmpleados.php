<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrar empleados</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>

    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
        
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
        <img class="aeronave" src="../img/officer.png" alt="Empleados" width="60%" height="60%" style="margin-top:25%;margin-left:15%;margin-right:15%">

        </div>


        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/officer.png" alt="Empleado" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="padding-bottom: 0rem! important; margin-bottom: 1rem! important;">Registrar empleados</h2>

        <form action="queryRegistrarEmpleados.php" method="POST" class="row g-3 needs-validation" novalidate>
			<div class="mb-4">
				<label for="labelNombreApellidos" class="form-label">Nombre y apellidos</label>
				<input type="text" class="form-control" minlength="1" maxlength="60" aria-describedby="ariaNombreApellidos" name="txtNombreApellidos" required placeholder="Ingresa nombre y apellidos" >
			
        <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>	
      
      <div class="mb-4">
				<label for="labelPuesto" class="form-label">Puesto</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="ariaPuesto" name="txtPuesto" required placeholder="Ingrese puesto">
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>	

      <div class="mb-4">
				<label for="labelHorasDeVuelo" class="form-label">Horas de vuelo</label>
				<input type="number" min="0" class="form-control" aria-describedby="ariaHorasDeVuelo" name="txtHorasVuelo" required placeholder="Ingrese horas de vuelo">
			</div>	

      <div class="mb-4">
				<label for="labelContactosEmergencia" class="form-label">Contactos de emergencia</label>
				<input type="tel" class="form-control" pattern="[0-9]{4}-[0-9]{4}" aria-describedby="ariaContactosEmergencia" name="txtContactosEmergencia" required placeholder="Ingrese contactos de emergencia con formato 1234-5678">
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>
      
      <div class="mb-4">
				<label for="labelTiempoEmpresa" class="form-label">Tiempo en empresa</label>
				<input type="number" class="form-control" min="0" aria-describedby="ariaTiempoEmpresa" name="txtTiempoEnEmpresa" required placeholder="Ingrese tiempos en empresa">
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      </div>

      <div class="mb-4">
				<label for="labelNacionalidad" class="form-label">Nacionalidad</label>
				<input type="text" class="form-control" minlength="1" maxlength="50" aria-describedby="ariaNacionalidad" name="txtNacionalidadEmpleado" required placeholder="Ingrese la nacionalidad">
			  <div class="valid-feedback">
            Datos ingresados.
          </div>
      
      </div>
      
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar empleados</button>
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