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

    <title>Modificar empleados</title>
  </head>
  <body>
    <!--h1>Iniciar sesion</h1-->
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/updated.png" alt="Idiomas" width="60%" height="60%" style="margin-top:15%;margin-right:15%;margin-left:15%;">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/updated.png" alt="Idiomas" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5">Actualizar datos empleados</h2>

        <form action="queryModificarEmpleados.php" method="POST">
                    
           	<div class="mb-4">
                <label for="">Codigo empleado </label>
                <input type="number" class="form-control" name="txtCodigoEmpleadoModificar"  value="<?=$_GET['codigoEmpleadoModificar']?>" aria-describedby="ariaCodigoEmpleado" placeholder="Codigo empleado" readonly required><br>
			</div>	
        	<div class="mb-4">
                <label for="">Nombres y apellidos</label>
                
                <input type="text" class="form-control" name="txtNuevosDatosEmpleado"  value="<?=$_GET['nuevosDatosEmpleado']?>" aria-describedby="ariaDatos" placeholder="Nombre y apellidos" required><br>            
			    </div>	
                  
        	<div class="mb-4">
                <label for="">Puesto</label>
                <input type="text" class="form-control" name="txtNuevoPuestoEmpleado"  value="<?=$_GET['nuevoPuestoEmpleado']?>" aria-describedby="ariaPuestoEmpleado" placeholder="Puesto y empleado" required><br>
                   
            </div>	
      
        	<div class="mb-4">                
                <label for="">Horas de vuelo</label>
                <input type="number" class="form-control" name="txtNuevoHorasDeVuelo"  value="<?=$_GET['nuevoHorasDeVuelo']?>" aria-describedby="ariaHorasVuelo" placeholder="Horas de vuelo" required><br>
			</div>	

        	<div class="mb-4">
                <label for="">Contacto de emergencia</label>
                <input type="text" class="form-control" name="txtNuevoContactoDeEmergencia"  value="<?=$_GET['nuevoContactoDeEmergencia']?>" aria-describedby="ariaContactoEmergencia" placeholder="Contacto de emergencia" required><br>
                   
			</div>	    
            
            <div class="mb-4">
                <label for="">Tiempo en empresa</label>
                <input type="number" class="form-control" name="txtNuevoTiempoEnEmpresa"  value="<?=$_GET['nuevoTiempoEnEmpresa']?>" aria-describedby="ariaTiempoEnEmergencia" placeholder="Tiempo en empresa" required><br>
            </div>	    
                
        	<div class="mb-4">
                <label for="">Tiempo en empresa</label>
                <input type="number" class="form-control" name="txtNuevoTiempoEnEmpresa"  value="<?=$_GET['nuevoTiempoEnEmpresa']?>" aria-describedby="ariaTiempoEnEmergencia" placeholder="Tiempo en empresa" required><br>
			</div>	    

            <div class="mb-4">
               <label for="">Nacionalidad</label>
                <input type="text" class="form-control" name="txtNuevoIdiomaDomina"  value="<?=$_GET['nuevoIdiomaDomina']?>" aria-describedby="ariaIdiomasDomina" placeholder="Ingrese nacionalidad" required><br>        
			</div>	    
	

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
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


