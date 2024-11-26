<?php
class Categoria {
    private $conn;
    private $table = "categorias";

    public $id;
    public $nombre;
    public $descripcion;
    public $fecha_creacion;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre, descripcion, fecha_creacion) VALUES (:nombre, :descripcion, :fecha_creacion)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':fecha_creacion', $this->fecha_creacion, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function resetAutoIncrement() {
        $query = "SELECT MAX(id) AS max_id FROM categorias";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Calcula el próximo valor de AUTO_INCREMENT
        $nextId = $result['max_id'] + 1;
    
        // Actualiza el valor del AUTO_INCREMENT
        $alterQuery = "ALTER TABLE categorias AUTO_INCREMENT = :nextId";
        $stmt = $this->conn->prepare($alterQuery);
        $stmt->bindParam(':nextId', $nextId, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
?>
