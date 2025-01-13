<?php
// index.php

require_once 'controllers/FormController.php';

$controller = new FormController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleFormSubmission();
} else {
    $controller->showForm();
}
?>