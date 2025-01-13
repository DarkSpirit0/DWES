<<<<<<< HEAD
<?php
namespace Ejemplo1;

const IVA = 0.21;

class Producto {
    public $nombre="EjemploProducto";

    public function muestra() : void {
        echo"<p>Prod:" . $this->nombre . "</p>";
    }
}

//Uso del namespace Dwes\Ejemplos, clase Producto.
$producto=new Producto();
$producto->muestra();

?>
=======
<?php
namespace Ejemplo1;

const IVA = 0.21;

class Producto {
    public $nombre="EjemploProducto";

    public function muestra() : void {
        echo"<p>Prod:" . $this->nombre . "</p>";
    }
}

//Uso del namespace Dwes\Ejemplos, clase Producto.
$producto=new Producto();
$producto->muestra();

?>
>>>>>>> 6334e5a (14/11 Semana4)
