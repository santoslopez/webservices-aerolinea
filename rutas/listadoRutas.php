
    <?php 
    include 'conexion/conexion.php';
    
    $listadoAeropuerto= "SELECT * FROM Aeropuerto";
    $ejecutarConsultaObtenerInfoAeropuerto = pg_query($conexion,$listadoAeropuerto);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfoAeropuerto))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay información de aeropuertos registrados.
              </div>
              <a href='aeropuerto/formularioRegistrarAeropuerto.php'><img src='img/airoport2.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar aeropuerto</a>";
    }else{
        $listadoRutas= "SELECT numeroVuelo,tiempoVuelo,horaSalida,distancia,aeropuertoOrigen,aeropuertoDestino FROM Rutas ORDER BY numeroVuelo";
        $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoRutas);
        
        // verificamos que existen registros, sino no dibujamos la tabla
        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo "<div class='alert alert-danger' role='alert'>
                    No hay información de rutas.
                  </div>
                  <a href='rutas/formularioRegistrarRutas.php'><img src='img/pin.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar rutas</a>";
        }else{             
            

            # Si hay datos, entonces dibujamos el encabezado una sola vez
            echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Numero vuelo</th>
                    <th scope="col">Tiempo vuelo</th>
                    <th scope="col">Hora salida</th>
                    <th scope="col">Distancia</th>
                    <th scope="col">
                        Aeropuerto origen
                    </th>

                    
                    <th scope="col">Aeropuerto destino</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            
            <tbody>';
            //$resultCuentas=pg_query($conexion, "SELECT codigoAeropuerto,nombreAeropuerto FROM Aeropuerto");

            while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                
                // ccodigoAeropuertoModificar, nuevoNombreAeropuerto y nuevoCiudadAeropuerto: se va recuperar en los formularios para modificar datos. El nombre se le pudo poner otro.
                echo "<td><a href=rutas/formularioModificarRutas.php?nuevoNumeroVuelo=".$row[0]."&nuevoTiempoVuelo=".urlencode($row[1])."&nuevoHoraSalida=".urlencode($row[2])."&nuevoValorDistancia=".urlencode($row[3])."&nuevoAeropuertoOrigen=".urlencode($row[4])."&nuevoAeropuertoDestino=".urlencode($row[5])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:10%;heigth:10%;align:rigth'></a></td>";

                // codigoIdiomaEliminar: se recupera en queryEliminarIdiomasDomina.php
                echo "<td><a href=rutas/queryEliminarRutas.php?codigoRutaEliminar=$row[0] class=opcionEliminarRutas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
            
                echo "</tr>";                                               
            }
            echo "</tbody>
            </table>
            <a href='rutas/formularioRegistrarRutas.php'><img src='img/pin.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar rutas</a>";

        }    
    }
    pg_close($conexion);

    ?> 
