<?php
// Mostrar datos recibidos por pantalla
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $input_type = $_POST['input_type'];
    
    // Datos específicos dependiendo del tipo de input seleccionado
    $event_size = isset($_POST['event_size']) ? $_POST['event_size'] : null;
    $public_type = isset($_POST['public_type']) ? $_POST['public_type'] : null;
    $activity_type = isset($_POST['activity_type']) ? $_POST['activity_type'] : null;
    $event_location = isset($_POST['event_location']) ? $_POST['event_location'] : null;
    $scope = isset($_POST['scope']) ? $_POST['scope'] : null;
    $other_event = isset($_POST['other_event']) ? $_POST['other_event'] : null;

    // Mostrar los datos recibidos en la pantalla
    echo "<h3>Datos recibidos:</h3>";
    echo "Nombre: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Tipo de entrada: " . htmlspecialchars($input_type) . "<br>";

    // Mostrar datos adicionales según el tipo de entrada
    if ($input_type == "Publico") {
        echo "Tamaño del evento: " . htmlspecialchars($event_size) . "<br>";
        echo "Tipo de acceso: " . htmlspecialchars($public_type) . "<br>";
    } elseif ($input_type == "Actividad") {
        echo "Tipo de actividad: " . htmlspecialchars($activity_type) . "<br>";
    } elseif ($input_type == "Ubicacion") {
        echo "Ubicación: " . htmlspecialchars($event_location) . "<br>";
        echo "Ámbito: " . htmlspecialchars($scope) . "<br>";
    } elseif ($input_type == "Otro") {
        echo "Otro tipo de evento: " . htmlspecialchars($other_event) . "<br>";
    }

    // Registrar los datos en un archivo
    $file = fopen("registro_datos.txt", "a");
    $data = "Nombre: " . $name . "\n" .
            "Email: " . $email . "\n" .
            "Tipo de entrada: " . $input_type . "\n" .
            ($event_size ? "Tamaño del evento: " . $event_size . "\n" : "") .
            ($public_type ? "Tipo de acceso: " . $public_type . "\n" : "") .
            ($activity_type ? "Tipo de actividad: " . $activity_type . "\n" : "") .
            ($event_location ? "Ubicación: " . $event_location . "\n" : "") .
            ($scope ? "Ámbito: " . $scope . "\n" : "") .
            ($other_event ? "Otro tipo de evento: " . $other_event . "\n" : "") .
            "-----------------------------------\n";

    fwrite($file, $data);
    fclose($file);

    echo "<p>Los datos se han registrado con éxito.</p>";
}
?>
