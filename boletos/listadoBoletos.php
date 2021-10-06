    <?php 

    include 'conexion/conexion.php';    

    $listadoViaje = "SELECT * FROM Viaje";
    $ejecutarConsultaObtenerInfoViaje = pg_query($conexion,$listadoViaje);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfoViaje))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de viajes registrados.
              </div>
              ";
    }else{

        $listadoBoletos = "SELECT numeroBoleto, nombrePasajero, fila, posicion, codigoViaje FROM Boletos";
        $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoBoletos);

        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo "<div class='alert alert-danger' role='alert'>
                    No hay información de boletos.
                  </div>

                  <a href='boletos/formularioRegistrarBoletos.php'><img src='img/boleto.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar boletos</a>";

        }else {
            # code...

                # Si hay datos, entonces dibujamos el encabezado una sola vez
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Numero de Boleto</th>
            <th scope="col">Nombre del Pasajero</th>
            <th scope="col">Fila</th>
            <th scope="col">Posición</th>
            <th scope="col">Código de Viaje</th>
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
        echo "<td><a href=boletos/formularioModificarBoletos.php?numeroBoleto=".urlencode($row[0])."&nombrePasajero=".urlencode($row[1])."&fila=".urlencode($row[2])."&posicion=".urlencode($row[3])."&codigoViaje=".urldecode($row[4])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

        // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
        echo "<td><a href=boletos/queryEliminarBoletos.php?numeroBoleto=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
     
        echo "</tr>";                                               
    }
    echo "</tbody>
    </table>
    <a href='boletos/formularioRegistrarBoletos.php'><img src='img/boleto.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar boletos</a>";


        }
                                        
    }
    pg_close($conexion);

?> 


  