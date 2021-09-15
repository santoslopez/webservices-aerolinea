<!--?php
	//include '../conexion/conexion.php';
	require_once("../perfil/sesionStart.php");
    rutaSesionDefault('Location: ../index.php');
?-->

<!doctype html>
<html lang="en">

  <body>

  <form action="queryModificarEmpleados.php" method="POST">
		<h2 style="color:red">Modificar datos de empleados</h2><br>
			<div class="form-group">
				<label for="exampleInputIdiomas">Datos</label>
                <!-- 
                    En value, en los GET: 
					todos los datos colocados provienen de listadoEmpleados.php en el enlace a href para modificar
				-->
                <label for="">Codigo empleado </label>
                <input type="number" class="form-control" name="txtCodigoEmpleadoModificar"  value="<?=$_GET['codigoEmpleadoModificar']?>" aria-describedby="ariaCodigoEmpleado" placeholder="Codigo empleado" readonly required><br>
                <label for="">Nombres y apellidos</label>
                <input type="text" class="form-control" name="txtNuevosDatosEmpleado"  value="<?=$_GET['nuevosDatosEmpleado']?>" aria-describedby="ariaDatos" placeholder="Nombre y apellidos" required><br>
                <label for="">Puesto</label>
                <input type="text" class="form-control" name="txtNuevoPuestoEmpleado"  value="<?=$_GET['nuevoPuestoEmpleado']?>" aria-describedby="ariaPuestoEmpleado" placeholder="Puesto y empleado" required><br>
                <label for="">Horas de vuelo</label>
                <input type="number" class="form-control" name="txtNuevoHorasDeVuelo"  value="<?=$_GET['nuevoHorasDeVuelo']?>" aria-describedby="ariaHorasVuelo" placeholder="Horas de vuelo" required><br>
                <label for="">Contacto de emergencia</label>
                <input type="text" class="form-control" name="txtNuevoContactoDeEmergencia"  value="<?=$_GET['nuevoContactoDeEmergencia']?>" aria-describedby="ariaContactoEmergencia" placeholder="Contacto de emergencia" required><br>
                <label for="">Tiempo en empresa</label>
                <input type="number" class="form-control" name="txtNuevoTiempoEnEmpresa"  value="<?=$_GET['nuevoTiempoEnEmpresa']?>" aria-describedby="ariaTiempoEnEmergencia" placeholder="Tiempo en empresa" required><br>
                <label for="">Nacionalidad</label>
                <input type="text" class="form-control" name="txtNuevoIdiomaDomina"  value="<?=$_GET['nuevoIdiomaDomina']?>" aria-describedby="ariaIdiomasDomina" placeholder="Ingrese nacionalidad" required><br>

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