<!-- 
    Archivo listadoEmpleados.php
    Aqui mostramos el listado de los empleados registrados. Tiene habilitado el registro, modificacion y eliminacion de datos.
-->

    <?php 
    include 'conexion/conexion.php';
    
    $listadoEmpleados = "SELECT codigoEmpleado,nombreDatos,puesto,horasDeVuelo,contactoDeEmergencia,tiempoEnEmpresa,nacionalidad FROM Empleados";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoEmpleados);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert' >
                No hay información de empleados
              </div>

          <a href='empleados/formularioRegistrarEmpleados.php'><img src='img/recepcionist.png' alt='HTML tutorial' style='width:15%;height:15%;'>
              Registrar empleados</a>";

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

        //echo "<td><a href=idiomasEmpleados/queryRegistrarIdiomasEmpleados?codigoEmpleadoEliminar=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
        echo "<td><a href=idiomasEmpleados/formularioRegistrarEmpleadosIdiomas.php?codigoEmpleadoDatos=".urlencode($row[0])."&nombreEmpleado=".urlencode($row[1])."><img src='img/plus.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";

        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>

    <a href='empleados/formularioRegistrarEmpleados.php'><img src='img/recepcionist.png' alt='HTML tutorial' style='width:15%;height:15%;'>
    Registrar empleados</a>";

    }
    pg_close($conexion);

    ?> 