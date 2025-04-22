# Laravel 12 - Controladores

## ⚙️ 1. Creación del Proyecto

```php
composer create-project laravel/laravel:^12.0 controllers
```

![1743948978141](image/Readme/1743948978141.jpg)

Nos movemos a la carpeta controllers con:

```php
cd controllers
```

---

## 🌐 2. Conexión Ruta - Controlador - Vista

### 2.1 Configuración de Base de Datos (`.env`)

![1743949014782](image/Readme/1743949014782.jpg)

```env
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

![1743949037262](image/Readme/1743949037262.jpg)

**Corregir fallo de la base de datos**

### 2.2 Migraciones y Modelo

- Utilizamos las del proyecto anterior
- Modelos

  ![1743949083793](image/Readme/1743949083793.jpg)
- Migraciones

  ![1743949099767](image/Readme/1743949099767.jpg)

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

![1743949178648](image/Readme/1743949178648.jpg)

### Definir Ruta

Vamos a la ruta siguiente **routes/web.php** y modificamos lo siguiente:

```php
use App\Http\Controllers\PlayerController;

Route::get('/', [PlayerController::class, 'index'])->name('player.index');
```

![1743949355826](image/Readme/1743949355826.jpg)

### Método en Controlador

```php
public function index()
    {
        $players = Player::where('age', '>', 18)
            ->where('age', '<', 30)
            ->orderBy('name', 'asc')
            ->orderBy('age', 'desc')
            ->get();
        return view('player.index',compact('players'));
    }
```

![1743949443586](image/Readme/1743949443586.jpg)

---

## 🎨 4. Vistas con Blade

- Crear archivo `resources/views/player/index.blade.php`
  ![1743949557448](image/Readme/1743949557448.jpg)

### Enviar Datos a la Vista

```php
return view('player.index', compact('players'));
```

![1743949685547](image/Readme/1743949685547.jpg)

---

## 📋 5. Consultas con Eloquent

```php
 public function index()
    {
        $players = Player::where('age', '>', 18)
            ->where('age', '<', 30)
            ->orderBy('name', 'asc')
            ->orderBy('age', 'desc')
            ->get();
        return view('player.index',compact('players'));
    }

```

- Métodos comunes: `get()`, `first()`, `find()`, `where()`, `offset()`, `orderBy()`

![1743949796789](image/Readme/1743949796789.jpg)

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

![1743949927100](image/Readme/1743949927100.jpg)

### Con Factories:

Yo utilizé esta opción ya que podia meter mas jugadores y es más facil:

```bash
php artisan make:factory PlayerFactory
php artisan db:seed
```

![1743950311549](image/Readme/1743950311549.jpg)

Y ahora completamos el seeder con lo siguiente:

```php
public function run(): void
    {
        $faker = \Faker\Factory::create();
        foreach (range(10, 20) as $index) {
            Player::create([
                'name' => $faker->name(),
                'age' => $faker->numberBetween(18, 40),
                'position' => $faker->randomElement(['Point Guard', 'Shooting Guard', 'Small Forward', 'Power Forward', 'Center']),
                'height' => $faker->numberBetween(150, 220),
                'weight' => $faker->numberBetween(50, 100),
                'team' => $faker->randomElement(['Lakers', 'Bulls', 'Celtics', 'Warriors', 'Nets', 'Heat', 'Mavericks', 'Clippers', 'Rockets', 'Suns']),
            ]);
        }
    }
```

![1743950389031](image/Readme/1743950389031.jpg)

y volvemos a migrar los seeders para que se carge el nuestro:

```php
php artisan db:seed
```

---

## 🧰 7. Mostrar Datos en Blade

Nos vamos al **index.blade.php** y lo modificamos para que nos muestre lo siguiente:

```html
    <h1>Lista de Jugadores</h1>

    <ul>
        @forelse($players as $player)
            <li>{{ $player->name }} — Edad: {{ $player->age }} años - Posición: {{ $player->position }} - Equipo: {{ $player->team }}</li>
        @empty
            <li>No hay jugadores registrados.</li>
        @endforelse
    </ul>
```

![1743950489227](image/Readme/1743950489227.jpg)

![1743951072743](image/Readme/1743951072743.jpg)

---

## 💬 8. Consultas SQL Raw

### Explicación paso a paso

* **Obtener jugadores (`index`)**

  Se usa `DB::select('select * from players')` para ejecutar una consulta SQL que recupera todos los registros de la tabla `players`.

  El resultado se pasa a una vista llamada `player.index`.

  ```php
  public function index() {
      $players = DB::select('select * from players');
      return view('player.index', compact('players'));
  }

  ```
* **Insertar un usuario (`create`)**

  * Se hace una inserción en la tabla `player` con una consulta SQL.
  * Usa `DB::insert(DB::raw(...))` para ejecutar una sentencia `INSERT`.

```php
public function create() {
    DB::insert(DB::raw('INSERT INTO player VALUE ...'));
}

```
