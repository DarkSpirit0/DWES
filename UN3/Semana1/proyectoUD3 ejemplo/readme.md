## Ejemplo MVC ProyectoUD3 con formularios

Para realizar el proyecto de la unidad 3, nos basamos en el proyecto de la unidad 2 y reestructuramos lo que necesitemos para aplicar la programación orientada a objetos y el modelo vista controlador MVC.

En este ejemplo, se parte de un sistema de formulario **Persona** en PHP con estructura **Modelo-Vista-Controlador (MVC)** sin hacer uso de bases de datos. Los datos se procesarán y mostrarán directamente en la misma ejecución.

---

### **Estructura de carpetas**

```
project/
│
├── index.php              # Archivo principal
├── app/
│   ├── controllers/
│   │   └── PersonaController.php
│   ├── models/
│   │   └── Persona.php
│   ├── views/
│       ├── form.php       # Vista del formulario
│       └── result.php     # Vista para mostrar los resultados
```

---

### **1. Modelo Persona (app/models/Persona.php)**

```php
<?php

class Persona {
    private $nombre;
    private $apellidos;
    private $telefono;

    public function __construct($nombre, $apellidos, $telefono) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getTelefono() {
        return $this->telefono;
    }
}
?>
```

---

### **2. Controlador PersonaController (app/controllers/PersonaController.php)**

```php
<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    public function showForm() {
        // Cargar la vista del formulario
        require_once __DIR__ . '/../views/form.php';
    }

    public function handleForm() {
        // Validar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';
            $telefono = $_POST['telefono'] ?? '';

            // Crear un objeto Persona con los datos del formulario
            $persona = new Persona($nombre, $apellidos, $telefono);

            // Pasar los datos a la vista de resultados
            require_once __DIR__ . '/../views/result.php';
        } else {
            // Si no es un POST, mostrar el formulario nuevamente
            $this->showForm();
        }
    }
}
?>
```

---

### **3. Vista del formulario (app/views/form.php)**

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Persona</title>
</head>
<body>
    <h1>Formulario Persona</h1>
    <form method="POST" action="index.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
```

---

### **4. Vista para mostrar los resultados (app/views/result.php)**

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Datos Recibidos</h1>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($persona->getNombre()) ?></p>
    <p><strong>Apellidos:</strong> <?= htmlspecialchars($persona->getApellidos()) ?></p>
    <p><strong>Teléfono:</strong> <?= htmlspecialchars($persona->getTelefono()) ?></p>
    <br>
    <a href="index.php">Volver al formulario</a>
</body>
</html>
```

---

### **5. Archivo principal (index.php)**

```php
<?php

require_once __DIR__ . '/app/controllers/PersonaController.php';

$controller = new PersonaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleForm();
} else {
    $controller->showForm();
}
?>
```

---

### **Flujo de la aplicación**

1. **Inicio:**
   - El usuario accede a `index.php`.
   - Se llama al método `showForm` del controlador para mostrar el formulario.
2. **Procesar datos:**
   - Cuando el usuario envía el formulario, el método `handleForm` procesa los datos y crea un objeto `Persona`.
   - Se carga la vista `result.php` para mostrar los datos enviados.
3. **Resultado:**
   - El usuario puede regresar al formulario desde la vista de resultados.
