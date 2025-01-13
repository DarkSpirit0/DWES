<?php
$totalPaginas = ceil($totalProductos / 5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <!-- Enlace al archivo CSS de Bootstrap desde el CDN -->
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Productos</title>
</head>
<body>
<h1>Lista de Productos</h1>
<a href="index.php?action=create">Nuevo Producto</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td><?= $producto['stock'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $producto['id'] ?>">Editar</a>
                <a href="index.php?action=delete&id=<?= $producto['id'] ?>" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
    <a href="?pagina=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>
</body>

</html>
