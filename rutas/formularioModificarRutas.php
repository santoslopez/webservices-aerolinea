<!doctype html>
<html lang="en">

  <body>


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
				<input type="number" class="form-control" aria-describedby="nameAeropuertoOrigen" value="<?=$_GET['nuevoAeropuertoOrigen']?>"  name="txtAeropuertoOrigen" required placeholder="Ingresa aeropuerto origen" >
			</div>


      <div class="mb-4">
				<label for="labelAeropuertoDestino" class="form-label">Aeropuerto destino</label>
				<input type="number" class="form-control" aria-describedby="nameAeropuertoDestino" value="<?=$_GET['nuevoAeropuertoDestino']?>" name="txtAeropuertoDestino" required placeholder="Ingresa aeropuerto destino" >
			</div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrar rutas</button>
          </div>

        </form>  



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>