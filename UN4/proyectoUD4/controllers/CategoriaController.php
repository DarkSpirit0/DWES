<?php
require_once 'models/categoria.php';

class CategoriaController {
    private $categoria;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->categoria = new Categoria($db);
    }

    public function getAll() {
        return $this->categoria->getAll();
    }

    public function create($data) {
        if (!isset($data['fecha_creacion']) || !is_numeric($data['fecha_creacion']) || $data['fecha_creacion'] < 1900 || $data['fecha_creacion'] > date('Y')) {
            throw new Exception("Año inválido. Ingrese un año entre 1900 y " . date('Y') . ".");
        }
        $this->categoria->nombre = $data['nombre'];
        $this->categoria->descripcion = $data['descripcion'];
        $this->categoria->fecha_creacion = $data['fecha_creacion'];
        return $this->categoria->create();
    }

    public function delete($id) {
        if (!is_numeric($id)) {
            throw new Exception("ID inválido para eliminación.");
        }
        $this->categoria->id = $id;
        return $this->categoria->delete();
    }
}
?>
