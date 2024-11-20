<?php

$persona1 = 10;
$persona2 = 20;
if ($persona1 > $persona2) {
    echo "La persona 1 es mayor que la persona 2";
} elseif ($persona1 < $persona2) {
    echo "La persona 2 es mayor que la persona 1";
}else{
    echo "La persona 2 tinen la misma edad que la persona 1";
}

//operador ternario

/*
1. Sintaxis basica del operador ternario:
La sintaxis basica de un operador ternario es la siguiente:

variable = (condicional) ? valor_si_verdad : valor_si_falso;

2. Ejemplo:
En el ejemplo anterior, la variable $persona1 es mayor que la variable $persona2 si la condición es verdadera, y la variable $persona2 es mayor que la variable $persona1 si la condición es falsa. */


echo $persona1 > $persona2 ? "La persona 1 es mayor que la persona 2" : "La persona 2 es mayor que la persona 1";

// Operador ternario anidado

$persona1 = 10;
$persona2 = 20;
echo $persona1 > $persona2 ? ($persona1 == $persona2 ? "La persona 1 y la persona 2 tienen la misma edad" : "La persona 1 es mayor que la persona 2") : "La persona 2 es mayor que la persona 1";


// Switch

$pie = 42;

switch($pie){
    case 42:
        echo "Tienes la medida estandar";
    case 45:
        echo "Tienes un pie muy grande";
    case 36:
        echo "Tienes un pie pequeño";
        break;
        default:
        echo "No se que  numero de pie tienes";
    }


?>