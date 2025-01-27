<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    public function showForm() {
        // Cargar la vista del formulario
        require_once __DIR__ . '/../views/form.php';
    }

    /**
     * The function `handleForm` processes form data, creates a `Persona` object with the submitted
     * data, and either displays the results or shows the form again based on the request method.
     */
    public function handleForm() {
        // Validar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';
            $telefono = $_POST['telefono'] ?? '';

            // Crear un objeto Persona con los datos del formulario
            $persona = new Persona($nombre, $apellidos, $telefono);

            // Pasar los datos a la vista de resultados
            require_once __DIR__ . '/../views/result.php';
        } else {
            // Si no es un POST, mostrar el formulario nuevamente
            $this->showForm();
        }
    }
}
?>