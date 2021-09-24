<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML lista_vuelos</title>
</head>
<body>
    
    <?php
        $aerolinea = 0;
        $fecha = 0;
        $origen = 0;
        $destino = 0;
        $numero = 0;
        $hora = 0;
        $precio = 0;

        $url = "http://localhost:8888/aerolinea/XML_listaVuelos/script_lista_vuelos.php";
        $xml = simplexml_load_file($url) or die ("La direccion URL".$url. " es incorrecto en simplexml_load");

        echo '<table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Fecha</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Numero</th>
            <th scope="col">Hora</th>
            <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>';

            //echo "dxml $xml ddd";

            foreach($xml->children() as $aerolinea ){
                $aerolinea = $aerolinea;
                echo "<tr><td>$aerolinea</td></tr>";
                
                foreach($aerolinea->children() as $vuelo ){
                    echo "<tr><td>$vuelo</td></tr>";
                }
            
                /*$fecha = $lista_vuelos->fecha;
                $origen = $lista_vuelos->origen;
                $destino = $lista_vuelos->destino;
                $numero = $lista_vuelos->numero;
                $hora = $lista_vuelos->hora;
                $precio = $lista_vuelos->precio;*/

                //echo "<tr>";
                
                //echo "<td>$aerolinea</td>";
                /*echo "<td>$fecha</td>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$numero</td>";
                echo "<td>$hora</td>";
                echo "<td>$precio</td>";*/
                
                //echo "</tr>";
            }
            echo "</tbody>
            </table>";
    ?>

</body>
</html>