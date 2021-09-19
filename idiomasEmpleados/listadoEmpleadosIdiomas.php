<!-- 
    Archivo listadoEmpleadosIdiomas.php
    Aqui mostramos el listado de los idiomas registrados. Tiene habilitado el registro, modificacion y eliminacion de datos.
-->
    <?php 
    include 'conexion/conexion.php';
    
    $listadoIdiomas = "SELECT codigoIdioma,nombreIdioma FROM Idiomas";
    $ejecutarConsultaObtenerInfoIdiomas = pg_query($conexion,$listadoIdiomas);


    $listadoEmpleados = "SELECT * FROM Empleados";
    $ejecutarConsultaObtenerInfoEmpleados = pg_query($conexion,$listadoEmpleados);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfoIdiomas))) {
        echo "<div class='alert alert-danger' role='alert' >
                No hay idiomas registrados
              </div>
              <a href='idiomas/formularioIdiomas.php'>Registrar idioma</a>";
    
    }else if (!(pg_num_rows($ejecutarConsultaObtenerInfoEmpleados))) {
                echo "<div class='alert alert-danger' role='alert' >
                        No hay empleados registrados
                      </div>
                      <a href='empleados/formularioRegistrarEmpleados.php'>Registrar empleados</a>";

    }else{

        $listadoEmpleadosPorIdioma = "SELECT codigoEmpleado,codigoIdioma FROM EmpleadoXIdioma";
        $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoEmpleadosPorIdioma);
        
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo "<div class='alert alert-danger' role='alert' >
                    No hay información de idiomas que domina el empleado
                  </div>
                 ";
        }else{
                                                
            # Si hay datos, entonces dibujamos el encabezado una sola vez
            echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo empleado</th>
                    <th scope="col">Codigo idioma</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            
            <tbody>';
            while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                
                // codigoIdiomaModificar y nuevoNombreIdioma: se va recuperar en los formularios para modificar datos. El nombre se le pudo poner otro.
                //echo "<td><a href=empleados/formularioModificarEmpleados.php?codigoEmpleadoModificar=$row[0]&nuevosDatosEmpleado=".urlencode($row[1])."&nuevoPuestoEmpleado=".urlencode($row[2])."&nuevoHorasDeVuelo=".urlencode($row[3])."&nuevoContactoDeEmergencia=".urlencode($row[4])."&nuevoTiempoEnEmpresa=".urlencode($row[5])."&nuevoIdiomaDomina=".urlencode($row[6])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

                // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
                //echo "<td><a href=empleados/queryEliminarEmpleado.php?codigoEmpleadoEliminar=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
            
                echo "</tr>";                                               
            }
            echo "</tbody>
            </table>";

        }

    
    }
    ?> 