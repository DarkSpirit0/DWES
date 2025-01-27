<<<<<<< HEAD
<?php
class Persona {
    // Propiedades
    public $nombre;
    public $edad;

    // Método constructor
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Método
    public function saludar() {
        return "Hola, mi nombre es $this->nombre y tengo $this->edad años.";
    }
}

// Crear un objeto de la clase Persona
$persona1 = new Persona("Juan", 25);
echo $persona1->saludar(); // Salida: Hola, mi nombre es Juan y tengo 25 años.
=======
<?php
class Persona {
    // Propiedades
    public $nombre;
    public $edad;

    // Método constructor
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Método
    public function saludar() {
        return "Hola, mi nombre es $this->nombre y tengo $this->edad años.";
    }
}

// Crear un objeto de la clase Persona
$persona1 = new Persona("Juan", 25);
echo $persona1->saludar(); // Salida: Hola, mi nombre es Juan y tengo 25 años.
>>>>>>> 6334e5a (14/11 Semana4)
?>