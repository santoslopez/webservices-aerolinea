
    <?php 
    include 'conexion/conexion.php';    
    
    $listadoTiposEventoUsuario = "SELECT codigoIdioma,nombreIdioma FROM Idiomas";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoTiposEventoUsuario);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de idiomas registrados.
              </div>
              <a href='idiomas/formularioIdiomas.php'>Registrar idiomas domina</a>";
    }else{
        
                                        
    # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Codigo idioma</th>
            <th scope="col">Idioma</th>
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
        echo "<td><a href=idiomas/formularioModificarIdiomas.php?codigoIdiomaModificar=".urlencode($row[0])."&nuevoNombreIdioma=".urlencode($row[1])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=idiomas/queryEliminarIdiomasDomina.php?codigoIdiomaEliminar=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
     
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='idiomas/formularioIdiomas.php'>Registrar idioma</a>";      
    
    
    }
    pg_close($conexion);

    ?> 