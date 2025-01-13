<?php
class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $user = $this->userModel-> authenticate($usuario, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                exit;
            } else {
                echo "<p>Credenciales inválidas</p>";
            }
        }
        include 'views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            if ($this->userModel->register($usuario, $password)) {
                echo "<p>Registro exitoso. <a href='index.php?action=login'>Iniciar sesión</a></p>";
            } else {
                echo "<p>Error al registrar usuario</p>";
            }
        }
        include 'views/register.php';
    }

public function index() {
    $limite = 5;
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $offset = ($pagina - 1) * $limite;
    $productos = Producto::obtenerTodos($limite, $offset);
    $totalProductos = Producto::contar();
    require __DIR__ . '/../views/index.php';
}

}
?>
