<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php if (isset($_SESSION['user'])): ?>
            <li><a href="index.php?action=logout">Cerrar Sesión</a></li>
        <?php else: ?>
            <li><a href="index.php?action=login">Iniciar Sesión</a></li>
            <li><a href="index.php?action=register">Registrarse</a></li>
        <?php endif; ?>
    </ul>
</nav>