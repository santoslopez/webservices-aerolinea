<?php 
    include 'conexion/conexion.php';    

    $listadoViaje = "SELECT codigoViaje, precio, fecha, numeroVuelo, matricula FROM Viaje";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoViaje);

    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de Viajes.
                </div>
                <a href='viajes/formularioRegistrarViaje.php'>Registrar Viaje</a>";
    }else{
        
                                        
    # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Código Viaje</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Vuelo</th>
            <th scope="col">Matrícula</th>
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
        echo "<td><a href=viajes/formularioModificarViaje.php?codigoViaje=".urlencode($row[0])."&precio=".urlencode($row[1])."&fecha=".urlencode($row[2])."&numeroVuelo=".urlencode($row[3])."&matricula=".urldecode($row[4])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=viajes/queryEliminarViaje.php?codigoViaje=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
        
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='viajes/formularioRegistrarViaje.php'>Registrar Viaje</a>";
    }
?> 


  