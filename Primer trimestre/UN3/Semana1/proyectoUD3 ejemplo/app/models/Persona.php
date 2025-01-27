<?php

/* This PHP class named Persona is likely used to represent a person with certain attributes and
behaviors. */
class Persona {
    private $nombre;
    private $apellidos;
    private $telefono;

    public function __construct($nombre, $apellidos, $telefono) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getTelefono() {
        return $this->telefono;
    }
}
?>