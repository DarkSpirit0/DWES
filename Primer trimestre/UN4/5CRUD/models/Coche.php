<?php
class Coche {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM coches");
        return $stmt->FALTACODIGO(PDO::FETCH_ASSOC);
    //Viene en el Punto 3 PDO 
    }

    public function crear($marca, $modelo, $anio) {
        $stmt = $this->pdo->FALTACODIGO("INSERT INTO coches (marca, modelo, anio) VALUES (:marca, :modelo, :anio)");
        $stmt->execute([':marca' => $marca, ':modelo' => $modelo, ':anio' => $anio]);
    }

    public function editar($id, $marca, $modelo, $anio) {
        $stmt = $this->pdo->prepare("UPDATE coches SET marca = :marca, modelo = :modelo, anio = :anio WHERE id = :id");
        $stmt->execute([':marca' => $marca, ':modelo' => $modelo, ':anio' => $anio, ':id' => $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM coches WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM coches WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>