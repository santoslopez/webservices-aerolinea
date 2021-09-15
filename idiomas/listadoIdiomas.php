<!-- 
    Archivo listadoIdiomas.php
    Aqui mostramos el listado de los idiomas registrados. Tiene habilitado el registro, modificacion y eliminacion de datos.
-->


<html lang="en">
<head>
    <!--meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado lenguas</title-->

    <!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
    <!--script src="js/mensajesPersonalizados.js" type="text/javascript"></script-->

</head>
<body>
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
    <a href='idiomas/formularioIdiomas.php'>Registrar idiomas domina</a>";      
    
    
    }
    ?> 


    <!--script>
		/* 
      .opcionEliminarTiposEventos: corresponde al nombre de la propiedad "CLASS" que se le puso en el a href, dentro del while para mostrar los datos    
    */
		var nombreClassBotonEliminar = '.opcionEliminarLenguas';
		mensajeEliminarContenido(nombreClassBotonEliminar,"Eliminar lenguas","Esto no se puede revertir","warning","Si, eliminar informacion.","../perfil/index.php");
	</script-->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->

</body>
</html>