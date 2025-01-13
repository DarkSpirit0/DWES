<?php
    // Codigo  PHP aquí
    // Comentario de linea
    echo "hola mundo";

    /*
        Este es un comentario
        de multiples lineas
    */

    echo "<p> Primer Script PHP </p>";

    echo "<p> El lenguaje PHP es un lenguaje de programación POCO TIPADO </p>";

    $lunes; // variable sin valor iniciado

    $lunes = "Hoy es lunes"; // cadena de caracteres

    $dia_semana= 1; // numérico

    // $2hola = "Hola"; // error de sintaxis
    $dia_mes = 14;

    echo $lunes;
    echo $dia_mes;
    echo "<p> Concatenando variables </p>";
    echo "Hoy es ".$lunes." ".$dia_mes;

    $dia_mes = "Catorce";

    echo "Hoy es ".$lunes." ".$dia_mes;

    $numero_pie = 45;
    $precio = 15.55;
    $campaña = "2024/2025";
    $descuento = true;
    $colores = array("rojo", 12, "verde", "azul");
    
    echo "<p> Mostarndo valores de los tipos creados </p>";
    echo "<br>".$numero_pie;
    echo "<br>".$precio;
    echo "<br>".$campaña;
    echo "<br>".$descuento;
    echo "<br>".$colores[2];
    

    class Coche {
        public $marca;
        public function __construct($marca) {
            $this->marca = $marca;
        }
    };
    
    $miCoche = new Coche("Toyota");

    echo "<br>";

    $x = 10; // Ámbito global

    function miFuncion() {
        global $x; // Hace $x accesible dentro de la función
        echo $x;
    }
    
    miFuncion(); // Imprime: 10

    echo "<br>";

    function contador() {
        static $contador = 0; // Persiste su valor entre llamadas
        $contador++;
        echo $contador;
    }

    
    contador(); // Imprime: 1
    contador(); // Imprime: 2
    contador(); // Imprime: 3
    contador();



?>


<?php
    echo "<br>";
    $foo = "0";  // $foo es string (ASCII 48)
    $foo += 2;   // $foo es ahora un integer (2)
    $foo = $foo + 1.3;  // $foo es ahora un float (3.3)
    $foo = 5 + "10"; // $foo es integer (15)
    $foo = 5 + "15";     // $foo es integer (15)

    echo $foo;
?>

<?php
echo "<br>";
    print "hola mundo";
    $nombre = "Antonio";
    echo "<br>";
    echo "Hola ", $nombre, " , ", $nombre, " adios";
    echo "<br>";
    print "Hola, " . $nombre . "!";

    echo "<br>";
    echo "Este es un 'ejemplo' con comillas dobles y simples.";
    echo "<br>";
    echo 'Este es un ejemplo con comillas dobles y simples.';

    echo "<br>";
    $ciclo= "DAW";
    $modulo= "Dwes";
    $horas= 168;
    printf("El %s de %s tiene %d horas de clase", $ciclo, $modulo, $horas);

    echo "<br>";
    printf("Número flotante con 2 decimales: %.2f\n", 3.14159); // Salida: Número flotante con 2 decimales: 3.14


?>