<?php

echo "<P> Constantes de PHP </p> <br> ";

define("CONSTANTS", "Hello world"); // Define una constante

echo "<p> El valor de la constante es </p>";CONSTANTS;

echo __LINE__  ." THE CURRENT LINE NUMBER OF THE FILE. <br>";
echo __FILE__ ." THE NAME OF THE FILE. <br>";

echo date("Y-m-d H:i:s")."<br>";
echo idate("Y-m-d H:i:s")."<br>";
echo localtime();

?>