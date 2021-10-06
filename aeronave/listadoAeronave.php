    <?php 

    include 'conexion/conexion.php';    

    $listadoAeronave = "SELECT matricula,marca, modelo,capacidadPasajeros,capacidadPeso FROM Aeronave";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoAeronave);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de aerolineas.
              </div>
              <a href='aeronave/formularioRegistrarAeronave.php'>Registrar aeronave</a>";
    }else{
        
                                        
    # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Matrícula</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Capacidad de Pasajeros</th>
            <th scope="col">Capacidad de Peso</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
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
        // ccodigoAeropuertoModificar, nuevoNombreAeropuerto y nuevoCiudadAeropuerto: se va recuperar en los formularios para modificar datos. El nombre se le pudo poner otro.
        echo "<td><a href=aeronave/formularioModificarAeronave.php?matricula=".urlencode($row[0])."&marca=".urlencode($row[1])."&modelo=".urlencode($row[2])."&capacidadPasajeros=".urlencode($row[3])."&capacidadPeso=".urldecode($row[4])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=aeronave/queryEliminarAeronave.php?matricula=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
     
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='aeronave/formularioRegistrarAeronave.php'>Registrar Aeronave</a>";
    }

    pg_close($conexion);

?> 


  