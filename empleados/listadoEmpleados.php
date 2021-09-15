<!-- 
    Archivo listadoIdiomas.php
    Aqui mostramos el listado de los idiomas registrados. Tiene habilitado el registro, modificacion y eliminacion de datos.
-->


<html lang="en">
<head>
   


</head>
<body>
    <?php 
    include 'conexion/conexion.php';
    
    $listadoEmpleados = "SELECT codigoEmpleado,nombreDatos,puesto,horasDeVuelo,contactoDeEmergencia,tiempoEnEmpresa,nacionalidad FROM Empleados";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoEmpleados);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert' >
                No hay información de empleados
              </div>
              <a href='empleados/formularioRegistrarEmpleados.php'>Registrar empleados</a>";
    }else{
        
                                        
    # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Codigo empleado</th>
            <th scope="col">Nombre y apellidos</th>
            <th scope="col">Puesto</th>
            <th scope="col">Horas de vuelo</th>
            <th scope="col">Contacto de emergencia</th>
            <th scope="col">Tiempo en empresa</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Idiomas que domina</th>
        </tr>
    </thead>
    
    <tbody>';
    while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        
        // codigoIdiomaModificar y nuevoNombreIdioma: se va recuperar en los formularios para modificar datos. El nombre se le pudo poner otro.
        echo "<td><a href=empleados/formularioModificarEmpleados.php?codigoEmpleadoModificar=$row[0]&nuevosDatosEmpleado=".urlencode($row[1])."&nuevoPuestoEmpleado=".urlencode($row[2])."&nuevoHorasDeVuelo=".urlencode($row[3])."&nuevoContactoDeEmergencia=".urlencode($row[4])."&nuevoTiempoEnEmpresa=".urlencode($row[5])."&nuevoIdiomaDomina=".urlencode($row[6])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=empleados/queryEliminarEmpleado.php?codigoEmpleadoEliminar=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
     
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='empleados/formularioRegistrarEmpleados.php'>Registrar empleados</a>";        
    
    }
    ?> 

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>