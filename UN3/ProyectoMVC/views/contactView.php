<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Out Everything</title>
    <link rel="stylesheet" href="styles/contact.css">
    <script src="scripts/contact.js"></script>
</head>
<body>
<header>
    <h1>Sold Out Everything</h1>
    <nav>
        <a href="Inicio.php">Inicio</a>
        <a href="Conocenos.php">Conócenos</a>
        <a href="Galeria.php">Galería</a>
        <a href="contactView.php">Contacto</a>
    </nav>
</header>

<section class="contact-section">
    <video width="800" height="600" autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
    </video>

    <div class="form-section">
        <h3>Contactanos !!</h3>
        <form action="index.php?controller=EventController&action=submitForm" method="post" onsubmit="openPopup(event);">
            <input type="text" name="name" placeholder="YOUR NAME *" required>
            <input type="email" name="email" placeholder="YOUR EMAIL *" required>

            <select name="input_type" id="input-type" onchange="showAdditionalFields()" required>
                <option value="" disabled selected>INPUT TYPE</option>
                <option value="Publico">Evento por público</option>
                <option value="Actividad">Evento por actividad</option>
                <option value="Ubicacion">Evento por ubicación</option>
                <option value="Otro">Otro</option>
            </select>

            <div id="field-publico" style="display: none;">
                <!-- Campos adicionales -->
            </div>

            <!-- Agregar los demás campos específicos -->

            <button type="submit">SEND</button>
        </form>
    </div>
</section>


<footer>
    <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
</footer>
</body>
</html>
