<?php
// models/Producto.php
require_once __DIR__ . '/Database.php';

class Producto
{
    private static function getDbConnection()
    {
        // Obtener la conexión PDO a través de la clase Database
        return Database::getInstance()->getConnection();
    }

    public static function obtenerTodos($limite, $offset)
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        $stmt = $pdo->prepare("SELECT * FROM productos LIMIT :limite OFFSET :offset");
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function contar()
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        return $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
    }

    public static function obtenerPorId($id)
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function crear($nombre, $precio, $stock)
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $precio, $stock]);
    }

    public static function actualizar($id, $nombre, $precio, $stock)
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        $stmt = $pdo->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?");
        return $stmt->execute([$nombre, $precio, $stock, $id]);
    }

    public static function eliminar($id)
    {
        // Obtener la conexión a la base de datos
        $pdo = self::getDbConnection();

        $stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
