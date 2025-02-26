# API Client Service

## Objetivo

Crear una API Client Service con relación NM (muchos a muchos).

### Características:

* Relacionamos los dos modelos (`Client` y `Service`).
* Usamos Middleware mediante grupo.
* Utilizamos `apiResource` en rutas en lugar de `resource` (no añade `create/update`).
* Opcional: Documentación con Swagger.

---

## Instalación

### Crear el proyecto Laravel

```bash
composer create-project laravel/laravel client-service
```

### Instalar API

```bash
php artisan install:api
```

### Crear AuthController

```bash
php artisan make:controller AuthController
```

---

## Rutas API (`routes/api.php`)

```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('services', ServiceController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas sin autenticación para pruebas
Route::apiResource('clients', ClientController::class);
Route::apiResource('services', ServiceController::class);

// Rutas para asociar servicios a clientes
Route::post('/clients/{client}/services/{service}', [ClientController::class, 'addService']); // Uno a la vez
Route::post('/clients/{client}/services', [ClientController::class, 'attachServices']); // Varios a la vez
```

---

## Controlador de Autenticación (`AuthController.php`)

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['token' => $user->createToken('api-token')->plainTextToken, 'user' => $user]);
    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => Auth::user()->createToken('api-token')->plainTextToken, 'user' => Auth::user()]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
```

---

## Modelos

### User (`User.php`)

```php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
}
```

### Client (`php artisan make:model Client -mcr`)

```php
class Client extends Model {
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];
}
```

### Service (`php artisan make:model Service -mcr`)

```php
class Service extends Model {
    use HasFactory;
    protected $fillable = ['name', 'description', 'price'];
}
```

---

## Migraciones

### Tabla intermedia `client_service`

```php
Schema::create('client_service', function (Blueprint $table) {
    $table->id();
    $table->foreignId('client_id')->constrained()->onDelete('cascade');
    $table->foreignId('service_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
```

### Clients (`create_clients_table.php`)

```php
Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone');
    $table->timestamps();
});
```

### Services (`create_services_table.php`)

```php
Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price', 10, 2);
    $table->timestamps();
});
```

### Ejecutar migraciones

```bash
php artisan migrate
```

---

## Poblar Base de Datos (Opcional)

```bash
php artisan db:seed
```

---

## Rutas para probar API

### Client Index (GET)

```bash
GET http://localhost:8000/api/clients
```

### Client Store (POST)

```json
{
   "name": "name...",
   "email": "test@test.com",
   "phone": "123456789"
}
```

### Service Store (POST)

```json
{
   "name": "Analyst",
   "description": "Analyst",
   "price": "100"
}
```

### Asociar servicios a un cliente (POST)

* **Varios a la vez**

```bash
POST http://localhost:8000/api/clients/1/services
```

```json
{
   "services": [1, 2]
}
```

* **Uno a la vez**

```bash
POST http://localhost:8000/api/clients/1/services/2
```

(Sin body, solo en la ruta)

---

## Mejora

* Ampliar y probar con autenticación a través de Laravel Sanctum.

---

## Referencias

* [El Rincón del ISMA 1: Curso de API REST con Laravel](https://www.youtube.com/watch?v=xyz)
* [El Rincón del ISMA 2: Construcción de API desde 0](https://www.youtube.com/watch?v=xyz)
