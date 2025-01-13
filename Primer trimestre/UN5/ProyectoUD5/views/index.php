<?php
$totalPaginas = ceil($totalProductos / 5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Lista de Productos</title>
</head>
<body>

<section>
<h1>CRUD Menú Inicio</h1>
            <h3>Navegación</h3>
            <ol>
                <li><a href="views/usuarios_registrados1.php">Página 1: Información General</a></li>
                <li><a href="views/usuarios_registrados2.php">Página 2: Recursos Exclusivos</a></li>
                <li><a href="views/usuarios_registrados3.php">Página 3: Contacto con Soporte</a></li>
            </ol>

          
</section>



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

<br> <a href="logout.php">Cerrar sesión</a>
</body>
</html>
