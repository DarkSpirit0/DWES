<<<<<<< HEAD
<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal hace un sonido";
    }
}

// Clase Perro que hereda de Animal
class Perro extends Animal {
    public function hacerSonido() {
        return "Guau Guau";
    }
}

$perro = new Perro("Max");
echo $perro->hacerSonido(); // Salida: Guau Guau
=======
<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal hace un sonido";
    }
}

// Clase Perro que hereda de Animal
class Perro extends Animal {
    public function hacerSonido() {
        return "Guau Guau";
    }
}

$perro = new Perro("Max");
echo $perro->hacerSonido(); // Salida: Guau Guau
>>>>>>> 6334e5a (14/11 Semana4)
?>