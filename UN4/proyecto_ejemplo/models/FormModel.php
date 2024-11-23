<?php
// models/FormModel.php

class FormModel {
    private $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'required' => true],
        ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
        ['name' => 'age', 'label' => 'Age', 'type' => 'number', 'required' => false],
    ];

    private $errors = [];

    public function getFields() {
        return $this->fields;
    }

    public function validateForm($data) {
        $this->errors = [];
        foreach ($this->fields as $field) {
            if ($field['required'] && empty($data[$field['name']])) {
                $this->errors[$field['name']] = $field['label'] . ' is required.';
            }
        }
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function saveData($data) {
        // Aquí puedes guardar los datos en una base de datos o procesarlos como necesites.
        file_put_contents('form_data.json', json_encode($data, JSON_PRETTY_PRINT));
    }
}
?>