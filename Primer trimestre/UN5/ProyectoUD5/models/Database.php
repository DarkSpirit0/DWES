<?php
class Database
{
    private static $instance = null;
    public $pdo;

    // Ruta de la base de datos
    private const DB_PATH = __DIR__ . '/database.sqlite';

    // Constructor privado (patrón Singleton)
    private function __construct()
    {
        try {
            $this->pdo = new PDO('sqlite:' . self::DB_PATH);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->crearTabla(); // Crear tabla si no existe
            $this->insertarProductosDeEjemplo(); // Insertar datos de ejemplo
            $this->crearTablaUsuarios();
            $this->insertarUsuarios();
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    // Método para obtener la instancia única de la clase (Singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Obtener la conexión PDO
    public function getConnection()
    {
        return $this->pdo;
    }

    // Crear tabla 'productos' si no existe
    private function crearTabla()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS productos (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                precio REAL NOT NULL,
                stock INTEGER NOT NULL
            )
        ");
    }

    // Insertar 10 productos de ejemplo si la tabla está vacía
    private function insertarProductosDeEjemplo()
    {
        $check = $this->pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
        if ($check == 0) {
            for ($i = 1; $i <= 10; $i++) {
                $this->pdo->exec("INSERT INTO productos (nombre, precio, stock) VALUES ('Producto $i', " . rand(10, 100) . ", " . rand(1, 50) . ")");
            }
        }
    }

    private function crearTablaUsuarios() {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                apellido TEXT NOT NULL,
                email TEXT NOT NULL,
                usuario TEXT NOT NULL,
                password TEXT NOT NULL
            )
        ");
    }
    private function insertarUsuarios() {
        $check = $this->pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
        if ($check == 0) {
            
                // Generar el hash de la contraseña utilizando password_hash()
                $passwordAdmin = password_hash('admin', PASSWORD_DEFAULT);
                $passwordUsuario = password_hash('usuario', PASSWORD_DEFAULT);
                $passwordAdministrador = password_hash('administrador', PASSWORD_DEFAULT);
                $passwordJuan = password_hash('juan', PASSWORD_DEFAULT);
            
                // Insertar los usuarios con la contraseña cifrada
                $this->pdo->exec("INSERT INTO usuarios (nombre, apellido, email, usuario, password) 
                    VALUES ('admin', 'admin', 'admin@example.com', 'admin', '$passwordAdmin')");
            
                $this->pdo->exec("INSERT INTO usuarios (nombre, apellido, email, usuario, password) 
                    VALUES ('usuario', 'usuario', 'usuario@example.com', 'usuario', '$passwordUsuario')");
            
                $this->pdo->exec("INSERT INTO usuarios (nombre, apellido, email, usuario, password) 
                    VALUES ('administrador', 'administrador', 'administrador@example.com', 'administrador', '$passwordAdministrador')");
            
                $this->pdo->exec("INSERT INTO usuarios (nombre, apellido, email, usuario, password) 
                    VALUES ('juan', 'perez', 'juan.perez@example.com', 'juan', '$passwordJuan')");
            
        }
    }
}
