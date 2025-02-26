# Autenticación API con Laravel y Sanctum

## Índice

* Introducción
* Instalación
* Crear Middleware
  * 3.1 Creación del Proyecto
  * Registrando Middleware en Kernel
  * Middleware en Rutas
  * Middleware en Grupos de Rutas
  * Middleware en Construcciones
* API Auth con Sanctum
* Conclusiones
* Enlace al tutorial

## Introducción

Este documento cubre la implementación de middleware y autenticación en una API RESTful utilizando Laravel y Sanctum. El middleware es una herramienta fundamental para proteger rutas y aplicar reglas de autenticación o roles en una aplicación. Laravel Sanctum se usa para autenticar usuarios mediante tokens, lo cual es crucial para la seguridad de la API.

## Instalación

1. Crear un nuevo proyecto Laravel:
   ```bash
   composer create-project laravel/laravel middlewareauth
   ```
2. Configurar la base de datos en el archivo `.env` (usar SQLite en lugar de MySQL si se está utilizando Laravel 11).

## Crear Middleware

### 3.1 Creación del Proyecto

Primero, creamos el middleware usando el comando de Artisan:

```bash
php artisan make:middleware Example
```

Esto generará un archivo `Example.php` dentro de `app/Http/Middleware/`. En este archivo, podemos implementar la lógica de protección para las rutas.

### Registrando Middleware en Kernel

En Laravel 11, los middleware se registran en el archivo `bootstrap/app.php` en lugar del archivo `Kernel.php`.

```php
$app->middleware([
    'example' => \App\Http\Middleware\Example::class,
]);
```

### Middleware en Rutas

Para aplicar un middleware a una ruta, podemos hacerlo directamente en `routes/api.php`:

```php
Route::middleware('example')->get('/', [ExampleController::class, 'index']);
```

### Middleware en Grupos de Rutas

Para aplicar middleware a un grupo de rutas, lo configuramos dentro de `bootstrap/app.php`:

```php
$middleware->group('api', ['example']);
```

### Middleware en Construcciones

Otra forma de aplicar middleware es en el constructor del controlador:

```php
public function __construct() {
    $this->middleware('example');
}
```

## API Auth con Sanctum

### ¿Qué es Laravel Sanctum?

Laravel Sanctum es un paquete que permite la autenticación de usuarios mediante tokens API. Usamos "Bearer tokens" para autenticar solicitudes.

1. **Crear el controlador de autenticación** :

```bash
   php artisan make:controller AuthController
```

1. **Crear las requests** :
   Para validar la creación de usuario y el inicio de sesión, se crean las requests `CreateUserRequest` y `LoginRequest`.

```bash
   php artisan make:request CreateUserRequest
   php artisan make:request LoginRequest
```

1. **Implementar funciones de autenticación** :
   En el controlador `AuthController`, implementamos las funciones para registrar y loguear a los usuarios.

```php
   public function store(CreateUserRequest $request) {
       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       return response()->json([
           'token' => $user->createToken("API Token")->plainTextToken
       ]);
   }
```

1. **Configuración de rutas** :
   En `routes/api.php`, definimos las rutas para la creación y login de usuarios:

```php
   Route::post('/create', [AuthController::class, 'store']);
   Route::post('/login', [AuthController::class, 'loginUser']);
   Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
       return $request->user();
   });
```

### Probar la API

1. **Crear usuario** :
   Realizamos una solicitud POST para crear un nuevo usuario y obtenemos un token de autenticación.
2. **Login de usuario** :
   Usamos el token para realizar un login con el siguiente encabezado `Authorization: Bearer <token>`.

## Conclusiones

* La autenticación API y el uso de middleware son fundamentales para la seguridad y el control de acceso en aplicaciones Laravel.
* Con Laravel Sanctum, podemos implementar un sistema de autenticación sencillo pero seguro utilizando tokens.
* Es importante entender cómo estructurar correctamente los middleware y autenticación para mantener el código limpio y seguro.

## Enlace al tutorial

Para más detalles y ejemplos completos, puedes consultar el [tutorial completo](https://laravel.com/docs/11.x/sanctum).
