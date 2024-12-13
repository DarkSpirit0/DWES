<?php
class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel-> authenticate($username, $password);

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
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->userModel->register($username, $password)) {
                echo "<p>Registro exitoso. <a href='index.php?action=login'>Iniciar sesión</a></p>";
            } else {
                echo "<p>Error al registrar usuario</p>";
            }
        }
        include 'views/register.php';
    }
}
?>
