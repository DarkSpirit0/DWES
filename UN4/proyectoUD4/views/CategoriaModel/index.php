<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Gestión de Categorías</title>
</head>
<body>
    <h1>Gestión de Categorías</h1>
    <?php if (isset($message)): ?>
        <div class="message success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="message error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="action" value="create">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input type="number" name="fecha_creacion" placeholder="Año de Creación" min="1900" max="<?= date('Y'); ?>" required>
        <button type="submit">Agregar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Año de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $categorias->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']); ?></td>
                    <td><?= htmlspecialchars($row['nombre']); ?></td>
                    <td><?= htmlspecialchars($row['descripcion']); ?></td>
                    <td><?= htmlspecialchars($row['fecha_creacion']); ?></td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
