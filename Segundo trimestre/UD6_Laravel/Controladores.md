# Controladores en Laravel

## 1. Introducción

Hemos trabajado con vistas, modelos y migraciones. Ahora completaremos el patrón MVC incorporando los controladores.

Un controlador en Laravel maneja las peticiones HTTP y coordina la comunicación entre modelos y vistas. En este documento, exploraremos:

* Creación de un proyecto con controladores.
* Vinculación entre ruta, controlador y vista.
* Consultas a modelos con Eloquent.
* Inserción de datos y uso de SQL Raw.

## 2. Creación del Proyecto y Configuración de Base de Datos

### 2.1 Creación del Proyecto

Desde la terminal, ejecutamos:

```sh
composer create-project laravel/laravel controllers
cd controllers
```

### 2.2 Configurar Base de Datos

Editamos el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=controllers
DB_USERNAME=root
DB_PASSWORD=root
```

Si usamos SQLite, esta configuración no es necesaria.

### 2.3 Modelado de Datos

Modificamos `database/migrations/0001_01_01_000000_create_users_table.php`:

```php
public function up(): void {
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->unsignedInteger('age')->default(18);
        $table->string('address')->nullable();
        $table->unsignedBigInteger('zip_code')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}
```

Editamos `app/Models/User.php` para definir los campos asignables:

```php
protected $fillable = [
    'name', 'email', 'password', 'age', 'address', 'zip_code'
];
```

Ejecutamos la migración:

```sh
php artisan migrate:refresh
```

## 3. Creación y Configuración del Controlador

### 3.1 Creación del Controlador

```sh
php artisan make:controller UserController
```

Editamos `routes/web.php`:

```php
use App\Http\Controllers\UserController;
Route::get('/', [UserController::class, 'index'])->name('user.index');
```

Definimos la función `index` en `app/Http/Controllers/UserController.php`:

```php
public function index() {
    return view('user.index');
}
```

Creamos la vista en `resources/views/user/index.blade.php`:

```html
<!DOCTYPE html>
<html>
<head><title>Usuarios</title></head>
<body>
    <h1>Hello World</h1>
</body>
</html>
```

## 4. Consultas a Modelos y Pintado de Datos

### 4.1 Obtener Usuarios

Importamos el modelo `User`:

```php
use App\Models\User;
```

Modificamos `index` para recuperar usuarios:

```php
public function index() {
    $users = User::all();
    return view('user.index', compact('users'));
}
```

En `user/index.blade.php`:

```html
<h1>Lista de Usuarios</h1>
<ul>
    @forelse($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <li>No hay usuarios registrados.</li>
    @endforelse
</ul>
```

### 4.2 Inserción de Datos

Definimos una ruta:

```php
Route::get('/create', [UserController::class, 'create'])->name('user.create');
```

Implementamos `create` en `UserController.php`:

```php
public function create() {
    User::create([
        'name' => 'Jose',
        'email' => 'jose@gmail.org',
        'password' => Hash::make('1234'),
        'age' => 42,
        'address' => 'Calle Martinez50',
        'zip_code' => 151515
    ]);
    return redirect()->route('user.index');
}
```

## 5. Consultas Avanzadas con Eloquent

Filtrar usuarios por edad y código postal:

```php
public function index() {
    $users = User::where('age', '>=', 18)
        ->where('zip_code', 151515)
        ->orWhere('zip_code', 141414)
        ->orderBy('age', 'asc')
        ->limit(5)
        ->get();
    return view('user.index', compact('users'));
}
```

Mostrar edad en la vista:

```html
<ul>
    @foreach($users as $user)
        <li>{{ $user->name }} - {{ $user->age }} años</li>
    @endforeach
</ul>
```

## 6. Consultas con SQL RAW

Podemos ejecutar consultas SQL directamente:

```php
use Illuminate\Support\Facades\DB;

public function index() {
    $users = DB::select('SELECT * FROM users');
    return view('user.index', compact('users'));
}
```

Insertar un usuario con SQL RAW:

```php
public function create() {
    DB::insert('INSERT INTO users (name, email, password, age, address, zip_code) VALUES (?, ?, ?, ?, ?, ?)',
        ['Luis', 'luis@gmail.com', Hash::make('1234'), 29, 'Calle 123', 14000]
    );
}
```

## 7. Conclusiones

* Laravel usa el patrón MVC para organizar la lógica.
* Eloquent permite interactuar con la BD de forma sencilla.
* Podemos usar consultas SQL directas cuando sea necesario.
* Practicar es clave para afianzar el conocimiento.
