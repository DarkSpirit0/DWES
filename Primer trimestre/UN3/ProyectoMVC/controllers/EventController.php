<?php
require_once 'models/EventModel.php';

class EventController {
    public function submitForm() {
        require 'views/contactView.php';
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener datos del formulario
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['input_type'];
            $details = $_POST['details'] ?? null;

            // Crear una instancia del modelo
            $event = new EventModel($name, $email, $type, $details);

            // Guardar los datos
            $event->save();

            // Redirigir a una página de confirmación
            header('Location: confirmation.php');
        }
    }
}
?>
