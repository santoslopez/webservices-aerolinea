<!--?php
	//include '../conexion/conexion.php';
	require_once("../perfil/sesionStart.php");
    rutaSesionDefault('Location: ../index.php');
?-->

<!doctype html>
<html lang="en">

  <body>

  <form action="queryModificarIdiomas.php" method="POST">
		<h2 style="color:red">Modificar tipos de eventos</h2><br>

			<div class="form-group">
				<label for="exampleInputIdiomas">Nuevo nombre del idioma</label>
                <!-- 
                    En value, en los GET:
                    
					codigoIdiomaModificar y nuevoNombreIdioma vienen del archivo listadoIdiomas.php
				-->
				
                <label for="lblCodigo">Codigo</label>
                <input type="text" class="form-control" name="txtCodigoIdioma"  value="<?=$_GET['codigoIdiomaModificar']?>" aria-describedby="ariaCodigoTipo" placeholder="Codigo idioma" readonly required><br>

                <label for="lblIdioma">Idioma</label>
                <input type="text" class="form-control" name="txtNuevoNombreIdioma"  value="<?=$_GET['nuevoNombreIdioma']?>" aria-describedby="emailSesion" placeholder="Nuevo nombre idioma" required>
                                            

            </div>
			<button type="submit" class="btn btn-success">Guardar cambios</button>
	</form>



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>