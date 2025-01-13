<?php

print "<h1>UD.2 Arrays</h1>";

print "<br>
Un array es un tipo de datos que nos permite almacenar varios valores. Cada miembro del array se almacena en una posición a la que se hace referencia utilizando un valor clave. Las claves pueden ser numéricas o asociativas.
<br>";

$persona = array("nombre" => "Juan", "edad" => 25);

$alumno = [
    "nombre" => "Juan",
    "ciclo" => "DAW",
];

print "<br> Array persona";
print_r ($persona);

print "<br> Array alumno";
print_r ($alumno);

print "<h2> Array Numerico y sus tres formas</h2>";
$modulos = array(0 => "Programación", 1 => "Bases de datos", 2 => "Desarrollo web en entorno servidor");
$alumnos1 = array("Antonio", "Rafa", "Sergio", "Francisco"); 
$alumnos2 = ["Antonio", "Rafa", "Sergio", "Francisco"];

print "<br> Array modulos";
print_r ($modulos);

print "<br> Array alumnos1";
print_r ($alumnos1);

print "<br> Array alumno2";
print_r ($alumnos2);

print "<br> El alumno 1 es: " . $alumnos1[0];

print "<br> El alumno 1 es: $alumnos1[0]";


print "<h2>Texto como arrays </h2>";

print "<br> print_r de la variable TEXTO para ver que las cadenas se pueden tratar como arrays  ";
    $texto= "hola";
    //print_r ($texto);
    print "<br /> ELEMENTO CADENA DE TEXTO hola [3]: ". $texto[3];


// array bidimensional
print "<h2>UD2. ARRAYS BIDIMENSIONALES O MULTIDIMENSIONALES</h2>";
$ciclos = array(
    "DAW" => array ("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor"),
    "DAM" => array ("PR" => "Programación", "BD" => "Bases de datos", "PMDM" => "Programación multimedia y de dispositivos móviles")
);



$bebidas = array(

    "marca" => array ("Coca-Cola", "Fanta", "Sprite"),
    "precio" => array (2.0, 1.8, 1.5)

);

$bebidas2 = [

    ["Coca-Cola", "Fanta", "Sprite"],
    [2.0, 1.8, 1.5],

];

print "<br> Asociativo (clave valor) </br>";
print_r ($bebidas);

print "<br> Asociativo numerico </br>";
print_r ($bebidas2);

print "<br> <h2> Array sin especificar tamaño </h2> </br>";

$cena_navidad[]="Carlos";
$cena_navidad[]="Antonio";
$cena_navidad[]="Rafa";
$cena_navidad[]="Sergio";
$cena_navidad[]="Francisco";
$cena_navidad[]="Adrian";
print_r ($cena_navidad);

print "<br> <h2> Recorrer los Array </h2> </br>";

foreach ($cena_navidad as $valor) {
    print "Invitado: " . $valor . " <br>";
}
print "<br>" ;
foreach ($cena_navidad as $id => $invitado)
print "El invitado número ". $id . " es " . $invitado . " <br>";


// ANEXO FOREACH con clave valor <br />";
print "<h2>FOREACH con clave valor de la variable SERVER </h2>";
/* 
foreach ($_SERVER as $clave => $valor) 
{
    print "<br/>";
    print "<tr/>";
        print "<td> Clave: ".$clave."</td> --------- Valor: ";
        print "<td>".$valor."</td>";
    print "</tr>";

}
*/

echo "<br><h2> Recorrer arrays con current </h2>";

$musica = array("Rock", "Break Beat", "Reggateon");


print_r ($musica);


echo "<br><h2> Recorrer arrays con while, next </h2>";
while ($valor = current($musica)) {

    print"<br> El codigo de la msuica: " . $valor;
    next($musica);
};

echo "<br><br /> <b> Recorrerlo uno a uno </b>";

   print "<br/>Reinicio el puntero con reset: ".reset($musica) ;
   print "<br/>La clave de la posición actual del array es: ". key($musica) ;
   print "<br/>El elemento del array musica es ".current($musica) ;
   print "<br/>El elemento del array musica es ".next($musica) ;
   print "<br/>El elemento del array musica es ".next($musica) ;
   print "<br/>La clave de la posición actual del array es: ". key($musica) ;
   print "<br/>El elemento del array musica es ".prev($musica) ;
   print "<br/>La clave de la posición actual del array es: ". key($musica) ;

   print "<br/>Reinicio el puntero con reset: ".reset($musica) ;
   print "<br/>La clave de la posición actual del array es: ". key($musica) ;
   print "<br/>El elemento final del array musica es ".end($musica);
   print "<br/>La clave de la posición actual del array es: ". key($musica) ;

print "<br> Eliminamos un eleemneto del array musica: ";

unset($musica[1]);

print_r ($musica);

$musica[0] = "Cumbia";
sort($musica);
print_r ($musica);


$para_buscar = "Cumbia";
    if (in_array($para_buscar, $musica)) 
     {

         print "<br/>Existe el elemento ". $para_buscar ;
         print "Su clave es ". array_search ($para_buscar, $musica);
     }
 
      else
          print "NO Existe el elemento ".$para_buscar ;


      //busqueda con 
      $para_buscar = "0";
      if (array_key_exists($para_buscar, $musica)) 
          {

              print "<br/>Existe el elemento ".$para_buscar ;
              print "El elemento es ". $musica[$para_buscar];
          }

          else
              print "NO Existe el elemento ".$para_buscar ;


?>