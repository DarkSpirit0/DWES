<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Out Everything</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #000;
            color: #fff;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 20px 50px;
            background-color: #222;
            align-items: center;
        }

        header h1 {
            font-size: 24px;
        }

        nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
        }

        .hero {
            text-align: center;
            padding: 50px;
        }

        .hero h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
            color: #ccc;
        }

        .section-vip {
            display: flex;
            justify-content: space-around;
            padding: 50px;
        }

        .section-vip img {
            width: 45%;
            border-radius: 10px;
        }

        .section-vip .text {
            width: 35%;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Estilo del footer */
        footer {
            background-color: #222;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 5px;
            font-size: 14px;
            color: #ccc;
        }

        /* Estilo general para los botones */
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .social-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        /* Estilos específicos para cada red social */
        .facebook { background-color: #3b5998; }
        .facebook:hover { background-color: #2d4373; }

        .twitter { background-color: #1da1f2; }
        .twitter:hover { background-color: #0d95e8; }

        .instagram { background-color: #e1306c; }
        .instagram:hover { background-color: #c13584; }

        .linkedin { background-color: #0077b5; }
        .linkedin:hover { background-color: #005983; }
    </style>
</head>
<body>
<header>
    <h1>Sold Out Everything</h1>
    <nav>
        <a href="Inicio.php">Inicio</a>
        <a href="conocenos.php">Conocenos</a>
        <a href="Galeria.php">Galeria</a>
        <a href="Contacto.php">Contacto</a>
    </nav>
    
</header>

<section class="hero">
    <h2>Bienvenido a Sold Out Everything</h2>
    <p>La organizadora de eventos en la que mas gente confía, nuestro personal es muy bueno y nos encanta hacer eventos para todo el mundo</p>
</section>

<section class="Inicio" style="text-align:center;">
    <img src="default_evento_social.webp" alt="Imagen inicio" width="600" height="400">
    <img src="acompa-a-sociales-1904x1269.jpg" alt="Imagen inicio2" width="600" height="400">
    <img src="evento5.png" alt="Imagen inicio3" width="600" height="400">
    <div class="text">
        <h3>Eventos para todo el mundo</h3>
        <p>Contacta con nosotros para asegurar un evento unico</p>
    </div>
</section>

<footer>
    <p>Síguenos en nuestras redes sociales</p>
        <div class="social-buttons">
            <a href="https://facebook.com" target="_blank" class="social-button facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank" class="social-button twitter" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com" target="_blank" class="social-button instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://linkedin.com" target="_blank" class="social-button linkedin" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</body>
</html>