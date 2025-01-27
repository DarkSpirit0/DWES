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
}
