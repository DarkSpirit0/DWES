
<?php
// config.php

// Iniciar sesión
session_start();

try {
    // Cambia 'mi_base_datos.sqlite' por la ruta de tu base de datos
    $pdo = new PDO('sqlite:' . __DIR__ . '/joyeriaa.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}


?>
