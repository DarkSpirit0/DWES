<?php
session_start();
require_once 'controllers/ProductController.php';
//require_once 'config.php';

// Obtener acción desde la URL (por defecto será 'index')
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Crear instancia del controlador de productos
$controller = new ProductoController();


if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}


// Ejecutar la acción correspondiente
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $controller->edit((int)$_GET['id']);
        } else {
            echo "ID de producto no proporcionado.";
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete((int)$_GET['id']);
        } else {
            echo "ID de producto no proporcionado.";
        }
        break;
    default:
        echo "Acción no válida.";
        break;
}
?>
