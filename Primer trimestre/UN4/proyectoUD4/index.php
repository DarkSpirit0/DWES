<?php
require_once 'config/db.php';
require_once 'controllers/CategoriaController.php';

$categoriaController = new CategoriaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'create':
                    $categoriaController->create($_POST);
                    $message = "¡Categoría agregada exitosamente!";
                    break;
                case 'delete':
                    $categoriaController->delete($_POST['id']);
                    $message = "¡Categoría eliminada exitosamente!";
                    break;
                default:
                    throw new Exception("Acción no válida.");
            }
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$categorias = $categoriaController->getAll();
include 'views/categoriaModel/index.php';
?>
