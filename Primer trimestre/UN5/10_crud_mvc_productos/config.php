<?php
// config.php
if (!defined('DB_PATH')) {
    define('DB_PATH', __DIR__ . '/database.sqlite');
}

try {
    $pdo = new PDO('sqlite:' . DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Crear tabla si no existe
$pdo->exec("
    CREATE TABLE IF NOT EXISTS productos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        precio REAL NOT NULL,
        stock INTEGER NOT NULL
    )
");

// Insertar 10 productos de ejemplo si la tabla está vacía
$check = $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
if ($check == 0) {
    for ($i = 1; $i <= 10; $i++) {
        $pdo->exec("INSERT INTO productos (nombre, precio, stock) VALUES ('Producto $i', " . rand(10, 100) . ", " . rand(1, 50) . ")");
    }
}
?>
