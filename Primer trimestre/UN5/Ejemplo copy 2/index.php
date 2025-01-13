<?php
// index.php

require_once 'config.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

// Instanciar el modelo y controlador
$userModel = new User($pdo);
$authController = new AuthController($userModel);

// Determinar la acción a realizar
$action = $_GET['action'] ?? null;

// Renderizar el encabezado con navegación
include 'views/header.php';

// Rutas básicas
switch ($action) {
    case 'login':
        $authController->login();
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'register':
        $authController->register();
        break;

    default:
        echo "<h1>Bienvenido al sistema</h1>";
        echo "<p>Por favor, selecciona una opción en el menú.</p>";
        break;
}

// Renderizar el pie de página si es necesario
?>
