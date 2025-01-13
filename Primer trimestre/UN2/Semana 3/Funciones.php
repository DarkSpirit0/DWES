<?php

$precio_consola=500;

function precio_iva_referencia($precio_arg){
    $precio=$precio*1.21;
}

$precio_consola_iva ($precio_consola);


$precio = 10;  //100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121


?>