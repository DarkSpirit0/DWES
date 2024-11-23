<?php
class EventModel {
    public $name;
    public $email;
    public $type;
    public $details;

    public function __construct($name, $email, $type, $details) {
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
        $this->details = $details;
    }

    public function save() {
        // Aquí se puede implementar la lógica para guardar los datos en una base de datos.
        // Por ejemplo:
        // $db = new DatabaseConnection();
        // $db->saveEvent($this);
    }
}
?>
