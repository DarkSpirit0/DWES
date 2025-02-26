# Curso Profesional de Laravel: Fundamentos

## Autoría

**Antonio Jesús Marín Espejo** - [pamarin@iesfranciscodelosrios.es](mailto:pamarin@iesfranciscodelosrios.es)

**Última versión:** Diciembre 2024

---

## Introducción

Este documento resume los puntos clave del tutorial: [Curso Profesional De LARAVEL: 1 - Fundamentos](https://www.youtube.com/watch?v=kV2jUg-iXYw).

### Versión Laravel

Este curso está basado en Laravel 11.

## Esquema del Curso

* **0:00:00** - Introducción a Laravel
* **0:05:47** - Configuración del Entorno de Trabajo
* **0:13:54** - Patrón MVC
* **0:25:30** - Estructura del Proyecto
* **0:51:14** - Hola Mundo
* **1:10:18** - Conclusiones

---

## Introducción a Laravel

Laravel es un framework PHP basado en el patrón MVC, aunque permite otros patrones arquitectónicos. Utiliza Eloquent como ORM, lo que evita el uso de instrucciones SQL directas.

## Configuración del Entorno de Trabajo

Se recomienda la instalación mediante Composer o Laravel Herd.

### Opción 1: Instalación con Composer

```sh
composer create-project laravel/laravel miproyecto
```

### Opción 2: Instalador de Laravel

```sh
composer global require laravel/installer
laravel new helloworld
```

### Opción 3: Laravel Herd

Permite crear proyectos sin necesidad de usar la terminal.

## Estructura del Proyecto

Elementos clave dentro del directorio del proyecto:

* **.env** : Configuración del entorno (base de datos, mensajería, etc.).
* **routes** : Define las rutas y su relación con los controladores.
* **resources/views** : Contiene las vistas del proyecto.
* **app/Models** : Modelos de la aplicación.
* **app/Http/Controllers** : Controladores del proyecto.
* **bootstrap** : Levanta el servicio para que funcione la aplicación.
* **database/migrations** : Define la estructura de las bases de datos.
* **public** : Punto de acceso del sistema.
* **config** : Configuración del framework.
* **storage** : Almacenamiento de archivos.
* **tests** : Pruebas unitarias y funcionales.
* **vendor** : Librerías y dependencias gestionadas por Composer.

## Instalación de API Rest en Laravel 11

```sh
php artisan install:api
```

Este comando instala Laravel Sanctum para la autenticación API.

---

## Hola Mundo en Laravel

Para iniciar el servidor local:

```sh
php artisan serve
```

Laravel carga la vista `resources/views/welcome.blade.php` a través de:

1. `index.php`
2. `bootstrap/app.php`
3. `routes/web.php`

Ejemplo de modificación de ruta en `web.php`:

```php
Route::view('/', 'landing.about')->name('about');
```

### Definiendo Rutas Múltiples

```php
Route::view('/', 'landing.index')->name('index');
Route::view('/about', 'landing.about')->name('about');
```

---

## Conclusiones

Hemos explorado los fundamentos del patrón MVC en Laravel, la configuración del entorno, la estructura del proyecto y la creación de rutas básicas.

Es recomendable familiarizarse con estos conceptos antes de avanzar en el desarrollo con Laravel.

### Referencias

* **[Documentación Oficial Laravel](https://laravel.com/docs/11.x)**
* **[Bootcamp Laravel](https://bootcamp.laravel.com/)**
* **[Curso Profesional Laravel: Video 1 - Fundamentos](https://www.youtube.com/watch?v=kV2jUg-iXYw)**
