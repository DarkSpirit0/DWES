<?php

require_once __DIR__ . '/app/controllers/PersonaController.php';

$controller = new PersonaController();

/* The `if (['REQUEST_METHOD'] === 'POST') {` statement is checking if the current HTTP request
method is POST. In PHP, `['REQUEST_METHOD']` contains the request method used to access the
page (e.g., GET, POST, PUT, DELETE). */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleForm();
} else {
    $controller->showForm();
}
?>