<?php 
include 'conexion/conexion.php';

$listadoViajes = "SELECT * FROM Viaje";
$ejecutarConsultaObtenerInfoViajes = pg_query($conexion,$listadoViajes);


$listadoEmpleados = "SELECT * FROM Empleados";
$ejecutarConsultaObtenerInfoEmpleados = pg_query($conexion,$listadoEmpleados);

// verificamos que existen registros, sino no dibujamos la tabla
if (!(pg_num_rows($ejecutarConsultaObtenerInfoViajes))) {
    echo "<div class='alert alert-danger' role='alert' >
            No hay viajes registrados
            </div>
            <a href='viajes/formularioRegistrarViaje.php'>Registrar Viaje</a>";

}else if (!(pg_num_rows($ejecutarConsultaObtenerInfoEmpleados))) {
            echo "<div class='alert alert-danger' role='alert' >
                    No hay empleados registrados
                    </div>
                    <a href='empleados/formularioRegistrarEmpleados.php'>Registrar empleados</a>";

}else{

    $listadoViajePorEmpleado = "SELECT E.codigoEmpleado, E.nombreDatos, V.codigoViaje, E.puesto
                                    FROM Viaje AS V, Empleados AS E, ViajeXEmpleado AS VE
                                    WHERE E.codigoEmpleado = VE.codigoEmpleado AND VE.codigoViaje = V.codigoViaje
                                    ORDER BY V.codigoViaje;";
    $ejecutarConsultaObtenerInfo = pg_query($conexion,$listadoViajePorEmpleado);
    
    // verificamos que existen registros, sino no dibujamos la tabla
    if (!(pg_num_rows($ejecutarConsultaObtenerInfo))) {
        echo "<div class='alert alert-danger' role='alert' >
                No hay información de la tripulacion por viajes
                </div>
                ";
    }else{
                                            
        # Si hay datos, entonces dibujamos el encabezado una sola vez
        echo '<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre empleado</th>
                <th scope="col">Puesto</th>
                <th scope="col">Codigo del Viaje</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        
        <tbody>';
        while ($row= pg_fetch_row($ejecutarConsultaObtenerInfo)) {
            echo "<tr>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[2]</td>";
            
            echo "<td><a href=viajesEmpleados/queryEliminarViajesEmpleado.php?codigoEmpleado=".urlencode($row[0])."&codigoViaje=".urlencode($row[2])." class=opcionEliminarLenguas><img src='img/x-button.png' class='zoomImagen' alt='Eliminar contenido' style='width:15%;heigth:15%'></a></td>";
        
            echo "</tr>";                                               
        }
        echo "</tbody>
        </table>";

    }


}
?> 