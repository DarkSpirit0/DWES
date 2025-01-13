<?php
// Archivo: funciones.inc.php

// Función para saludar
function saludar($nombre) {
    return "Hola, $nombre! Bienvenido a nuestra página.";
}

// Función para sumar dos números
function sumar($a, $b) {
    return $a + $b;
}

// Función para obtener el mayor de dos números
function obtenerMayor($a, $b) {
    return ($a > $b) ? $a : $b;
}
?>