<?php
session_start();
//require('config.php');
require_once __DIR__ . '/models/Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', $usuario);
    $result = $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location:index.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
