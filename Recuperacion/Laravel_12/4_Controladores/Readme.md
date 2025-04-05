# Laravel 12 - Controladores

## ⚙️ 1. Creación del Proyecto

```php
composer create-project laravel/laravel:^12.0 controllers
```

Nos movemos a la carpeta controllers con:

```php
cd controllers
```

---

## 🌐 2. Conexión Ruta - Controlador - Vista

### 2.1 Configuración de Base de Datos (`.env`)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=controllers
DB_USERNAME=root
DB_PASSWORD=root
```

### 2.2 Migraciones y Modelo

- Utilizamos las del proyecto anterior

### Migrar Base de Datos

Refrescamos las migraciones para que se carguen con los datos que hemos creado basandonos en el proyecto anterior.

```bash
php artisan migrate:refresh
```

---

## 🧠 3. Controladores

### Crear Controlador

```php
php artisan make:controller PlayerController
```

### Definir Ruta

Vamos a la ruta siguiente **routes/web.php** y modificamos lo siguiente:

```php
use App\Http\Controllers\PlayerController;

Route::get('/', [PlayerController::class, 'index'])->name('player.index');
```

### Método en Controlador

```php
public function index() {
    return view('player.index');
}
```

---

## 🎨 4. Vistas con Blade

- Crear archivo `resources/views/player/index.blade.php`

### Enviar Datos a la Vista

```php
return view('player.index', compact('users'));
```

---

## 📋 5. Consultas con Eloquent

```php
use App\Models\Player;

$players = Player::where('age', '>=', 18)
             ->orderBy('age', 'asc')
             ->get();
```

- Métodos comunes: `get()`, `first()`, `find()`, `limit()`, `offset()`, `orderBy()`, `pluck()`

---

## 🔄 6. Inserción de Datos

Podemos añadir los datos manualmente en el Controlador de Player que se encuentra en la ruta:

**/app/Controllers/PlayerController.php**

y nos vamos a la parte de **public fuction create**, para modificarla y añadirle lo siguiente:

### Manual:

```php
  Player::create([
            'name' => 'John Doe',
            'age' => 25,
            'position' => 'Shooting Guard',
            'height' => 180,
            'weight' => 75,
            'team' => 'Laker',
        ]);
```

### Con Factories:

```bash
php artisan make:factory UserFactory
php artisan db:seed
```

---

## 🧰 7. Mostrar Datos en Blade

```blade
@forelse($users as $user)
    <li>{{ $user->name }} - {{ $user->age }}</li>
@empty
    <li>No hay usuarios</li>
@endforelse
```

---

## 💬 8. Consultas SQL Raw

```php
use Illuminate\Support\Facades\DB;

$users = DB::select('SELECT * FROM users');
DB::insert('INSERT INTO users (...) VALUES (...)');
```
