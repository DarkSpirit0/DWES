<<<<<<< HEAD
<?php 
/*
Para declarar una clase, se utiliza la palabra clave class seguido del nombre de la clase. 
Para instanciar un objeto a partir de la clase, se utiliza new:
*/
class Persona {
    private string $nombre;

    public function setNombre(string $nom) {
        $this->nombre=$nom;
    }

    public function imprimir(){
        echo $this->nombre;
        echo '<br>';
    }
}

$bruno = new Persona(); // creamos un objeto
$bruno->setNombre("Alejandro Lopez Maya"); // llamamos a su setter
$bruno->imprimir(); // imprimimos

=======
<?php 
/*
Para declarar una clase, se utiliza la palabra clave class seguido del nombre de la clase. 
Para instanciar un objeto a partir de la clase, se utiliza new:
*/
class Persona {
    private string $nombre;

    public function setNombre(string $nom) {
        $this->nombre=$nom;
    }

    public function imprimir(){
        echo $this->nombre;
        echo '<br>';
    }
}

$bruno = new Persona(); // creamos un objeto
$bruno->setNombre("Alejandro Lopez Maya"); // llamamos a su setter
$bruno->imprimir(); // imprimimos

>>>>>>> 6334e5a (14/11 Semana4)
?>