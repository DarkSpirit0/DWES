# Testing en Laravel

## Índice

- [Introducción](#introducción)
- [Creación de Test](#creación-de-test)
- [Escribiendo Tests](#escribiendo-tests)
- [Aplicando TDD](#aplicando-tdd)
- [Ejemplo Tests en Proyectos](#ejemplo-tests-en-proyectos)
- [Conclusiones](#conclusiones)
- [Referencias](#referencias)

---

## Introducción

El testing es una disciplina esencial en el desarrollo de software. Todo desarrollador debe ser capaz de realizar diferentes tipos de pruebas para garantizar la calidad del código.

## Creación de Test

### Tipos de Tests

- **Test Unitarios**: Evalúan funciones o acciones concretas de pequeños fragmentos del código.
- **Test de Integración**: Verifican el flujo completo de una funcionalidad en el sistema.

### Importancia de los Tests

- Son fundamentales en cualquier trabajo profesional.
- Se pueden escribir antes del desarrollo (TDD) o después de codificar.
- Se recomienda crear un entorno especial para testing evitando afectar bases de datos reales.

## Escribiendo Tests

### Creación de un Proyecto Laravel

```bash
composer create-project laravel/laravel testexample
```

### Creación de Tests con PHPUnit

```bash
php artisan make:test UserTest       # Test de tipo Feature
php artisan make:test UserTest --unit # Test de tipo Unitario
```

### Estructura de un Test en Laravel

```php
public function test_example(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
}
```

### Ejemplo: Test para Listar Usuarios

```php
public function test_get_users_list(): void
{
    $response = $this->get('/users');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        ['id', 'name', 'email', 'created_at', 'updated_at']
    ]);
    $response->assertJsonFragment(['name' => 'Antonio']);
    $response->assertJsonCount(4);
}
```

## Aplicando TDD

### Configuración del Entorno de Testing

- Duplicar y renombrar el archivo `.env` como `.env.testing`.
- Modificar la conexión de base de datos:

```ini
DB_CONNECTION=sqlite_testing
DB_DATABASE=database/databasetesting.sqlite
```

- Configurar en `config/database.php`:

```php
'sqlite_testing' => [
    'driver' => 'sqlite',
    'database' => env('DB_DATABASE', database_path('databasetesting.sqlite')),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
],
```

- Migrar la base de datos de prueba:

```bash
php artisan migrate --env=testing
```

### Creación de Controlador y Rutas

```bash
php artisan make:controller UserController
```

En `routes/api.php`:

```php
Route::get('/users', [UserController::class, 'index']);
```

En `UserController.php`:

```php
public function index()
{
    return response()->json(User::all());
}
```

### Creación de Seeder

```bash
php artisan make:seeder UserSeeder
```

En `UserSeeder.php`:

```php
public function run(): void
{
    User::factory()->create(['name' => 'Antonio']);
    User::factory(3)->create();
}
```

### Corriendo Tests

```bash
php artisan test
```

## Ejemplo Tests en Proyectos

Se recomienda implementar tests en proyectos ya existentes, asegurando su correcto funcionamiento.

## Conclusiones

- El testing es fundamental en el desarrollo profesional.
- TDD ayuda a escribir código más robusto.
- Implementar tests desde el inicio mejora la calidad del software.

## Referencias

- Documentación oficial de Laravel Testing: [https://laravel.com/docs/testing](https://laravel.com/docs/testing)
