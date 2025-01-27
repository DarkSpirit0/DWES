<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Datos Recibidos</h1>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($persona->getNombre()) ?></p>
    <p><strong>Apellidos:</strong> <?= htmlspecialchars($persona->getApellidos()) ?></p>
    <p><strong>Teléfono:</strong> <?= htmlspecialchars($persona->getTelefono()) ?></p>
    <br>
    <a href="index.php">Volver al formulario</a>
</body>
</html>