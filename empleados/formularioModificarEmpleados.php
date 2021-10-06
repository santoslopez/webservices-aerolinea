<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modificar empleados</title>
    <script src="../js/validate.js"></script>

  </head>
  <body>

    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/updated.png" alt="Idiomas" width="60%" height="60%" style="margin-top:15%;margin-right:15%;margin-left:15%;">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/updated.png" alt="Idiomas" width="48">
          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5" style="margin-bottom: 0rem! important; padding-bottom:0.5rem! important; padding-top: 0rem! important;">Actualizar datos empleados</h2>

        <form action="queryModificarEmpleados.php" method="POST" class="row g-3 needs-validation" novalidate>
                    
           	<div class="mb">
                <label for="">Codigo empleado </label>
                <input type="number" class="form-control" name="txtCodigoEmpleadoModificar"  value="<?=$_GET['codigoEmpleadoModificar']?>" aria-describedby="ariaCodigoEmpleado" placeholder="Codigo empleado" readonly required><br>
			      </div>	
        	<div class="mb">
                <label for="">Nombres y apellidos</label>
                
                <input type="text" class="form-control" name="txtNuevosDatosEmpleado"  value="<?=$_GET['nuevosDatosEmpleado']?>" aria-describedby="ariaDatos" placeholder="Nombre y apellidos" required><br>            
                <div class="valid-feedback">
            Datos ingresados.
          </div>

          </div>	
                  
        	<div class="mb">
                <label for="">Puesto</label>
                <input type="text" class="form-control" name="txtNuevoPuestoEmpleado"  value="<?=$_GET['nuevoPuestoEmpleado']?>" aria-describedby="ariaPuestoEmpleado" placeholder="Puesto y empleado" required><br>
                <div class="valid-feedback">
                  Datos ingresados.
                </div>
          </div>	
      
        	<div class="mb">                
                <label for="">Horas de vuelo</label>
                <input type="number" class="form-control" name="txtNuevoHorasDeVuelo"  value="<?=$_GET['nuevoHorasDeVuelo']?>" aria-describedby="ariaHorasVuelo" placeholder="Horas de vuelo" required><br>
                <div class="valid-feedback">
            Datos ingresados.
          </div>
      
          </div>	

        	<div class="mb">
                <label for="">Contacto de emergencia</label>
                <input type="tel" class="form-control" pattern="[0-9]{4}-[0-9]{4}" name="txtNuevoContactoDeEmergencia"  value="<?=$_GET['nuevoContactoDeEmergencia']?>" aria-describedby="ariaContactoEmergencia" placeholder="Contacto de emergencia" required><br>
                <div class="valid-feedback">
            Datos ingresados.
          </div>   
			</div>	    
            
           
                
        	<div class="mb">
                <label for="">Tiempo en empresa</label>
                <input type="number" class="form-control" name="txtNuevoTiempoEnEmpresa"  value="<?=$_GET['nuevoTiempoEnEmpresa']?>" aria-describedby="ariaTiempoEnEmergencia" placeholder="Tiempo en empresa" required><br>
                <div class="valid-feedback">
            Datos ingresados.
          </div>
          </div>	    

            <div class="mb">
               <label for="">Nacionalidad</label>
                <input type="text" class="form-control" name="txtNuevoIdiomaDomina"  value="<?=$_GET['nuevoIdiomaDomina']?>" aria-describedby="ariaIdiomasDomina" placeholder="Ingrese nacionalidad" required><br>        
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


