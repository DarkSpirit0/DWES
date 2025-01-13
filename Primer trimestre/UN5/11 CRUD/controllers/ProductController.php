<?php
require_once __DIR__ . '/../models/Product.php';


class ProductoController {
    public function index() {
        $limite = 5;
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $offset = ($pagina - 1) * $limite;
        $productos = Producto::obtenerTodos($limite, $offset);
        $totalProductos = Producto::contar();
        require __DIR__ . '/../views/index.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Producto::crear($_POST['nombre'], $_POST['precio'], $_POST['stock']);
            header('Location: index.php');
        } else {
            require __DIR__ . '/../views/create.php';
        }
    }
    public function edit($id) {
        $producto = Producto::obtenerPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Producto::actualizar($id, $_POST['nombre'], $_POST['precio'], $_POST['stock']);
            header('Location: index.php');
        } else {
            require __DIR__ . '/../views/edit.php';
        }
    }
    public function delete($id) {
        Producto::eliminar($id);
        header('Location: index.php');
    }
}
?>
