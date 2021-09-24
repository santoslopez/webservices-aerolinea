<!-- 
    Archivo listadoAeropuerto.php
    Aqui mostramos el listado de los idiomas registrados. Tiene habilitado el registro, modificacion y eliminacion de datos.
-->



    <?php 

    include 'conexion/conexion.php';    

    $listadoAeropuerto = "SELECT codigoAeropuerto,nombreAeropuerto,ciudad,pais FROM Aeropuerto ORDER BY codigoAeropuerto";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoAeropuerto);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de aeropuertos.
              </div>
              <a href='aeropuerto/formularioRegistrarAeropuerto.php'>Registrar aeropuerto</a>";
    }else{
        
                                        
    # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Codigo aeropuerto</th>
            <th scope="col">Nombre aeropuerto</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Pais</th>
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
        // ccodigoAeropuertoModificar, nuevoNombreAeropuerto y nuevoCiudadAeropuerto: se va recuperar en los formularios para modificar datos. El nombre se le pudo poner otro.
        echo "<td><a href=aeropuerto/formularioModificarAeropuerto.php?codigoAeropuertoModificar=".urlencode($row[0])."&nuevoNombreAeropuerto=".urlencode($row[1])."&nuevoCiudadAeropuerto=".urlencode($row[2])."&nuevoPaisAeropuerto=".urlencode($row[3])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=aeropuerto/queryEliminarAeropuerto.php?codigoAeropuertoEliminar=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
     
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='aeropuerto/formularioRegistrarAeropuerto.php'>Registrar aeropuerto</a>";
    
    
    }
    ?> 


  