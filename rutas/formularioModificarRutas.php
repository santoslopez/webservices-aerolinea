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

    <title>Modificar RUTAS</title>
  </head>
  <body>
    <!--h1>Iniciar sesion</h1-->
   
    <div class="container w-75  mt-5 rounded shadow" style="background:#F5F5F5;">
      
     
      <div class="row align-items-stretch">
     
        <div class="col bgRegistrarCuenta d-none d-lg-block col-md-5 col-xl-6 rounded" > 
          <img class="aeronave" src="../img/updated.png" alt="Idiomas" width="100%" height="80%">
        </div>

        <div class="col bg-white pd-5 rounded-end">
          <div class="text-end">
            <img src="../img/updated.png" alt="Idiomas" width="48">

          </div>

        <h2 class="fw-bold text-center pt-5 mb-5 py-5">Actualizar datos ruta</h2>

		<form action="queryModificarRuta.php" method="POST">
        
		
      
        	<div class="mb-4">
				<label for="labelNumeroVuelo" class="form-label">Numero de vuelo</label>
				<input type="number" readonly class="form-control" aria-describedby="nameNumeroVuelo" value="<?=$_GET['nuevoNumeroVuelo']?>"  name="txtNumeroVuelo" required placeholder="Ingresa el numero de vuelo" >
			</div>	
      
      		<div class="mb-4">
				<label for="labelCiudadAeropuerto" class="form-label">Tiempo vuelo</label>
				<input type="number" class="form-control" aria-describedby="nameTiempoVuelo" value="<?=$_GET['nuevoTiempoVuelo']?>"  name="txtTiempoVuelo" required placeholder="Ingresa tiempo de vuelo" >
			</div>	
           
			<div class="mb-4">
				<label for="labelHoraSalida" class="form-label">Hora salida</label>
				<input type="text" class="form-control" aria-describedby="nameHoraSalida" value="<?=$_GET['nuevoHoraSalida']?>" name="txtHoraSalida" required placeholder="Ingresa el tiempo de salida" >
			</div>

          	<div class="mb-4">
				<label for="labelDistancia" class="form-label">Distancia</label>
				<input type="number" class="form-control" aria-describedby="nameDistancia" value="<?=$_GET['nuevoValorDistancia']?>" name="txtDistancia" required placeholder="Ingresa la distancia" >
			</div>


	      	<div class="mb-4">
				<label for="labelAeropuertoOrigen" class="form-label">Aeropuerto de origen</label>
				<input type="text" class="form-control" aria-describedby="nameAeropuertoOrigen" value="<?=$_GET['nuevoAeropuertoOrigen']?>"  name="txtAeropuertoOrigen" required placeholder="Ingresa aeropuerto origen" >
			</div>


      		<div class="mb-4">
				<label for="labelAeropuertoDestino" class="form-label">Aeropuerto destino</label>
				<input type="text" class="form-control" aria-describedby="nameAeropuertoDestino" value="<?=$_GET['nuevoAeropuertoDestino']?>" name="txtAeropuertoDestino" required placeholder="Ingresa aeropuerto destino" >
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
