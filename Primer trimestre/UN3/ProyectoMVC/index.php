<?php
require_once 'controllers/EventController.php';

// Obtener controlador y acción desde la URL
$controller = $_GET['controller'] ?? 'EventController';
$action = $_GET['action'] ?? 'submitForm';

// Crear una instancia del controlador y llamar a la acción
if (class_exists($controller) && method_exists($controller, $action)) {
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    echo "Página no encontrada.";
}
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
