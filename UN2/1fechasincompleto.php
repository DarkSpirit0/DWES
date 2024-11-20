<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatos de Fecha</title>
</head>
<body>
    
        <h1>Encuentra los 20 Formatos de Fecha Diferentes</h1>
        
            <table>
                <thead>
                    <tr>
                        <th>Formato</th>
                        <th>Fecha</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $formatos = [
                        'd/m/Y', 
                        'Y-m-d', 
                        'Y-m-d H:i:s ', 
                        'F d,Y', 
                        'm.d.Y', 
                        'd, m, Y', 
                         'r', 
                        'd-m-Y', 
                        'dS F Y', 
                        'l, d-m-Y', 
                        'Y/m/d', 
                    ];

                    // Mostrar cada formato de fecha en la tabla
                    foreach ($formatos as $formato) {
                        echo "<tr>";
                            echo "<td>" . $formato . "</td>";
                            echo "<td>" . date($formato) . "</td>";
                        echo "</tr>";
                    }
                    /*

                    // Mostrar cada formato de fecha en la tabla
                        echo "<tr>";
                            echo "<td>  0 -> $formatos[0]</td>";
                            echo "<td>" . date($formatos[0]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>  1 -> $formatos[1]</td>";
                            echo "<td>" . date($formatos[1]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  2 -> $formatos[2]</td>";
                            echo "<td>" . date($formatos[2]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  3 -> $formatos[3]</td>";
                            echo "<td>" . date($formatos[3]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  4 -> $formatos[4]</td>";
                            echo "<td>" . date($formatos[4]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  5 -> $formatos[5]</td>";
                            echo "<td>" . date($formatos[5]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  6 -> $formatos[6]</td>";
                            echo "<td>" . date($formatos[6]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                             echo "<td>  7 -> $formatos[7]</td>";
                            echo "<td>" . date($formatos[7]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  8 -> $formatos[8]</td>";
                            echo "<td>" . date($formatos[8]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>  9 -> $formatos[9]</td>";
                            echo "<td>" . date($formatos[9]) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                         echo "<td>  10 -> $formatos[10]</td>";
                            echo "<td>" . date($formatos[10]) . "</td>";
                        echo "</tr>";

*/
                    
                    ?>
                </tbody>
            </table>
        
    
</body>
</html>
