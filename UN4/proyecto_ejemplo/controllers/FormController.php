<?php
// controllers/FormController.php

require_once 'models/FormModel.php';

class FormController {
    private $model;

    public function __construct() {
        $this->model = new FormModel();
    }

    public function showForm() {
        $fields = $this->model->getFields();
        include 'views/layout.php';
    }

    public function handleFormSubmission() {
        $data = $_POST;
        $isValid = $this->model->validateForm($data);

        if ($isValid) {
            $this->model->saveData($data);
            include 'views/success.php';
        } else {
            $fields = $this->model->getFields();
            $errors = $this->model->getErrors();
            include 'views/layout.php';
        }
    }
}
?>