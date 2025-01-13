<<<<<<< HEAD
<?php
// Registrar la función de autoload
spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});

// Instanciar las clases
$user = new User();    // Output: Clase User cargada.
$product = new Product(); // Output: Clase Product cargada.

=======
<?php
// Registrar la función de autoload
spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});

// Instanciar las clases
$user = new User();    // Output: Clase User cargada.
$product = new Product(); // Output: Clase Product cargada.

>>>>>>> 6334e5a (14/11 Semana4)
?>