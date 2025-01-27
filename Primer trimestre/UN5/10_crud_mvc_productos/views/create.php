<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Nuevo Producto</h1>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br>

        <button type="submit">Guardar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
