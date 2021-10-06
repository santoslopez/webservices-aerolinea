<?php 
    include 'conexion/conexion.php';    

    $listadoAeronaves = "SELECT matricula,marca,capacidadPasajeros,capacidadPeso,modelo FROM Aeronave";
    $ejecutarConsultaObtenerInfoAeronaves = pg_query($conexion,$listadoAeronaves);   


    $listadoRutas = "SELECT * FROM Rutas";
    $ejecutarConsultaObtenerInfoRutas = pg_query($conexion,$listadoRutas);       



    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfoAeronaves))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay aeronaves registrados actualmente.
                </div>
                <a href='aeronave/formularioRegistrarAeronave.php'>Registrar aeronave</a>";
    
     // verificamos que existen registros, sino no dibujamos la tabla
    }elseif  (!(pg_num_rows($ejecutarConsultaObtenerInfoRutas))) {
        echo "<div class='alert alert-danger' role='alert'>
                No hay informacion de rutas registrados actualmente.
                </div>
                ";
    
    }else{
        
    
    
        $listadoViaje = "SELECT codigoViaje, precio, fecha, numeroVuelo, matricula FROM Viaje";
        $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoViaje);   

        $listadoEmpleados = "SELECT * FROM Empleados";
        $ejecutarConsultaObtenerInfoEmpleados = pg_query($conexion,$listadoEmpleados);  
    

        if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
            echo "<div class='alert alert-danger' role='alert'>
                    No hay VIAJES registrados actualmente.
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
                    <th scope="col">Asignar tripulacion</th>
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
                
                echo "<td><a href=viajes/formularioModificarViaje.php?codigoViaje=".urlencode($row[0])."&precio=".urlencode($row[1])."&fecha=".urlencode($row[2])."&numeroVuelo=".urlencode($row[3])."&matricula=".urldecode($row[4])."><img src='img/refresh.png' class='zoomImagen' alt='Actualizar contenido' style='width:15%;heigth:15%;align:rigth'></a></td>";

                echo "<td><a href=viajes/queryEliminarViaje.php?codigoViaje=$row[0] class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
                
                if  (!(pg_num_rows($ejecutarConsultaObtenerInfoEmpleados))) {
                    echo "<td><a href='#'><img src='img/block.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'>Sin empleados</a></td>";
 
                }else {
                    # code...
                    echo "<td><a href=viajesEmpleados/formularioRegistrarEmpleadosViajes.php?codigoViaje=".urlencode($row[0])."&precio=".urlencode($row[1])."&fecha=".urlencode($row[2])."&numeroVuelo=".urlencode($row[3])."&matricula=".urldecode($row[4])."><img src='img/plus.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
                }

     
                echo "</tr>";                                               
            }
            echo "</tbody>
            </table>
            <a href='viajes/formularioRegistrarViaje.php'><img src='img/viajero.png' alt='HTML tutorial' style='width:15%;height:15%;'>Registrar viaje</a>";


        }    
    }
    pg_close($conexion);

?> 


  