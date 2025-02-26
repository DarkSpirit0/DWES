
Durante la instalación, selecciona las siguientes opciones:

* **Breeze**
* **Blade** (o Vue/React según preferencia)
* **Modo oscuro opcional**
* **SQLite como base de datos**
* **Ejecutar migraciones automáticamente**

### 2️⃣ Configurar dependencias

Accede al proyecto y ejecuta:

```sh
cd authbreeze
npm install && npm run build
```

Esto instalará las dependencias de **TailwindCSS** y otros paquetes de frontend.

### 3️⃣ Ejecutar migraciones

Si no se ejecutaron automáticamente, usa:

```sh
php artisan migrate
```

Esto creará las tablas necesarias para los usuarios y la autenticación.

---

## 🔑 Configuración de Autenticación

Laravel Breeze proporciona autenticación básica con sesiones. Para personalizarla:

* **Archivos de configuración** :
* `config/auth.php`: Define el guard por defecto (`web` para sesiones).
* `config/session.php`: Configura el almacenamiento de sesiones.
* **Variables de entorno** :
* `.env`: Puedes modificar valores como `SESSION_DRIVER` o `SESSION_LIFETIME`.

Si necesitas autenticación basada en API con tokens, revisa  **Laravel Sanctum** .

---

## 🌟 Agregar Rutas y Vistas

### 1️⃣ Rutas protegidas

Modifica `routes/web.php` para incluir rutas protegidas:

```php
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/example', [ExampleController::class, 'index'])->name('example');
});
```

### 2️⃣ Crear un nuevo controlador y vista

Genera un controlador para una nueva vista protegida:

```sh
php artisan make:controller ExampleController
```

Modifica `ExampleController.php`:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller {
    public function index() {
        return view('example');
    }
}
```

Crea la vista en `resources/views/example.blade.php` copiando la estructura de `dashboard.blade.php` y personalizando el contenido.

---

## 🎨 Personalización del Frontend

Laravel Breeze usa **TailwindCSS** para estilos. Puedes modificar:

* **CSS y JavaScript** en `resources/css` y `resources/js`
* **Menú de navegación** en `resources/views/layouts/navigation.blade.php`
* **Componentes reutilizables** en `resources/views/components/`

Ejecuta:

```sh
npm run dev
```

Para compilar los cambios en el frontend.

---

## ⚡ Jetstream: Alternativa Avanzada

Si prefieres una solución más completa con **Livewire** o  **Inertia.js** , puedes usar **Jetstream** en lugar de Breeze:

```sh
laravel new authjetstream
```

Durante la instalación, elige:

* **Jetstream**
* **Blade** o **Inertia.js** según el stack que prefieras
* **Soporte para administración de equipos (opcional)**

Luego, instala las dependencias:

```sh
php artisan jetstream:install livewire
npm install && npm run build
php artisan migrate
```

---

## 📌 Conclusión

Este proyecto proporciona autenticación con Laravel Breeze y la posibilidad de ampliarlo con Jetstream. Puedes personalizarlo para adaptarlo a tus necesidades, añadiendo roles, permisos o autenticación API con Laravel Sanctum.

---

## 🔗 Referencias

* [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)
* [Laravel Jetstream](https://jetstream.laravel.com/2.x/)
* [TailwindCSS](https://tailwindcss.com/)

```

Este **README.md** es claro, estructurado y listo para incluirse en tu repositorio. 🚀 ¿Quieres agregar algo más? 😃
```
