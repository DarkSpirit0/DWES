<?php

error_reporting(E_ERROR | E_PARSE);


$variable=18.17;
$variable=18;
$variable="Hello World";
$variable=null;
$variable=array(1,2,3,4,5);
$variable=true;

echo "El tipo de la variable es: ".gettype($variable)."<br>";

echo "Var_Drump -> ",var_dump($variable)."<br>";

echo "<br> ¿es un array? ->", is_array($variable);

$salida=is_array($variable);

echo "<br> ¿es la salida boleana? ->", is_bool($salida);



$a = $b= 18;

settype($b, "float");
print "\$a vale $a y es de tipo: ".gettype($a)."<br>";
print "<br />";
print "\$b vale $b y es de tipo: ".gettype($b)."<br>";


?>