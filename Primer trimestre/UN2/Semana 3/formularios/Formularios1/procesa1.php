<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Procesa</h1>
    <p>El nombre del que ha rellenado el formulario es: </p>
    <?php

        $nombre = $_POST["nombre"];

        $modulos = $_POST["modulos"];

        print "Nombre: " . $nombre. "<br />";

        foreach ($modulos as $clave => $modulo) {
            print "Clave: " . $clave . " Modulo: " . $modulo . "<br />";
        }
        
        print_r($_POST);
    ?>

</body>
</html>