<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página con Pico CSS</title>
    <!-- Enlace al CDN de Pico CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Funciones</h1>
        <nav>
            <ul>
            <li>
                <a href="#">Funciones</a></li>
                <li><a href="#">Argumentos</a></li>
                <li><a href="#">Include/Require</a></li>
                <li><a href="#">Extensiones</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>

            <h2>Funciones</h2>
            <p>Este es el ejemplo de una funcion</p>

            

            <?php
            echo "<section>";
            
            echo function_test();
            echo"</section>";
            function function_test() {
                
            $grupo="ACDC";
            $disco="<b> Hihgwey to hell </b>";
            return"<p>El grupo $grupo saco el disco $disco </p>";
            }


            ?>

    <h2> UD 2 5 Funcion Test</h2>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>