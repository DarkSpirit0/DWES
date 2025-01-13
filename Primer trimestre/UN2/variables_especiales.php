<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Variables especiales</title>
    </head>
    <body>
        <H1>Prueba de variables especiales</H1>
        <h2>Variables especiales</h2>
        <pre>
            <?php print_r($_SERVER); ?>
        </pre>

        <h2>Variables superglobales</h2>
        <pre>
            <?php print_r($_REQUEST); ?>
        </pre>
        <h2>Variables globales</h2>

        <pre>
            <?php print_r($_GET); ?>
        </pre>

        <h2>Variables locales</h2>
        <pre>
            <?php print_r($_POST); ?>
        </pre>
        

    </body>
</html>
