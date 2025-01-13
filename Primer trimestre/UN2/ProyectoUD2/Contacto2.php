<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Out Everything</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    .contact-hero {
        text-align: center;
        padding: 50px;
    }
    .contact-hero h2 {
        font-size: 36px;
        margin-bottom: 10px;
    }
    .contact-hero p {
        font-size: 18px;
        color: #ccc;
    }
    .contact-section {
        display: flex;
        justify-content: space-around;
        padding: 50px;
    }
    .contact-section img {
        width: 45%;
        border-radius: 10px;
    }
    .form-section {
        width: 35%;
        background-color: #333;
        padding: 20px;
        border-radius: 10px;
        text-align: left;
    }
    .form-section h3 {
        font-size: 24px;
        margin-bottom: 20px;
    }
    .form-section input, .form-section select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
    }
    .form-section button {
        width: 100%;
        padding: 12px;
        background-color: #e74c3c;
        border: none;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }
    .contact-info {
        font-size: 16px;
        color: #fff;
        margin-top: 30px;
    }
    .contact-info a {
        color: white;
        text-decoration: none;
    }
    .contact-info p {
        margin: 5px 0;
    }
    .social-icons {
        margin-top: 20px;
    }
    .social-icons a {
        color: white;
        margin: 0 10px;
        text-decoration: none;
        font-size: 20px;
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
<script>
    function showAdditionalFields() {
        // Ocultar todos los campos adicionales al inicio
        document.getElementById("field-publico").style.display = "none";
        document.getElementById("field-actividad").style.display = "none";
        document.getElementById("field-ubicacion").style.display = "none";
        document.getElementById("field-otro").style.display = "none";

        // Selecciona el tipo de evento
        const selectInputType = document.getElementById("input-type");

        // Muestra los campos adicionales específicos según la opción seleccionada
        if (selectInputType.value === "Publico") {
            document.getElementById("field-publico").style.display = "block";
        } else if (selectInputType.value === "Actividad") {
            document.getElementById("field-actividad").style.display = "block";
        } else if (selectInputType.value === "Ubicacion") {
            document.getElementById("field-ubicacion").style.display = "block";
        } else if (selectInputType.value === "Otro") {
            document.getElementById("field-otro").style.display = "block";
        }
    }

    function showSubFields(fieldId, subFieldId) {
        // Muestra/oculta subcampos específicos en función de la opción seleccionada
        document.getElementById(subFieldId).style.display = document.getElementById(fieldId).value ? "block" : "none";
    }

    function openPopup(event) {
        // Prevenir que el formulario se envíe inmediatamente
        event.preventDefault();

        // Obtener los datos del formulario
        let formData = new FormData(event.target);
        
        // Crear una ventana emergente
        let popup = window.open("", "Popup", "width=600,height=400");

        // Crear contenido HTML para la ventana emergente
        let content = "<h3>Datos recibidos:</h3>";

        // Recorrer los datos del formulario y agregar al contenido
        formData.forEach(function(value, key) {
            content += `<p><strong>${key.replace(/_/g, ' ').toUpperCase()}:</strong> ${value}</p>`;
        });

        // Insertar el contenido en la ventana emergente
        popup.document.write(content);
    }
</script>

</head>
<body>
<header>
    <h1>Sold Out Everything</h1>
    <nav>
        <a href="Inicio.php">Inicio</a>
        <a href="conocenos.php">Conócenos</a>
        <a href="Galeria.php">Galería</a>
        <a href="Contacto.php">Contacto</a>
    </nav>
</header>

<section class="contact-section">
    <video width="800" height="600" autoplay loop muted>
        <source src="3918375-uhd_3840_2160_30fps.mp4" type="video/mp4">
    </video>

    <div class="form-section">
        <h3>Contactanos !!</h3>
        <form action="process.php" method="post" onsubmit="openPopup(event);">
            
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
                <label for="event-size">Tamaño del evento (público):</label>
                <input type="number" name="event_size" placeholder="Número de personas" />

                <label for="public-type">Tipo de acceso:</label>
                <select id="public-type" name="public_type" onchange="showSubFields('public-type', 'public-subfield')" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Publico">Público</option>
                    <option value="Privado">Privado</option>
                </select>
                <div id="public-subfield" style="display: none;">
                    <label for="event-description">Descripción del evento:</label>
                    <input type="text" name="event_description" placeholder="Describe el evento">
                </div>
            </div>

            <div id="field-actividad" style="display: none;">
                <label for="activity-type">Tipo de actividad:</label>
                <select id="activity-type" name="activity_type" onchange="showSubFields('activity-type', 'activity-subfield')" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Cultura">Cultura</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Sociales">Sociales</option>
                    <option value="Empresarial">Empresarial</option>
                </select>
                <div id="activity-subfield" style="display: none;">
                    <label for="activity-details">Detalles de la actividad:</label>
                    <input type="text" name="activity_details" placeholder="Detalles de la actividad">
                </div>
            </div>

            <div id="field-ubicacion" style="display: none;">
                <label for="location">Ubicación del evento:</label>
                <input type="text" name="event_location" placeholder="Escribe la ubicación" />

                <label for="scope">Ámbito:</label>
                <select id="scope" name="scope" onchange="showSubFields('scope', 'scope-subfield')" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Regional">Regional</option>
                    <option value="Nacional">Nacional</option>
                    <option value="Internacional">Internacional</option>
                </select>
                <div id="scope-subfield" style="display: none;">
                    <label for="scope-details">Detalles del ámbito:</label>
                    <input type="text" name="scope_details" placeholder="Detalles del ámbito">
                </div>
            </div>

            <div id="field-otro" style="display: none;">
                <label for="other_event">Otro tipo de evento:</label>
                <input type="text" name="other_event" placeholder="Especifica el tipo de evento" />
            </div>

            <button type="submit">SEND</button>
        </form>
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

</body>
</html>