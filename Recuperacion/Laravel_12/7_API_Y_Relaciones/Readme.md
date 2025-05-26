# 🏀 Basketball API REST con Laravel

## 1. Introducción

Este proyecto utiliza Laravel para crear una API RESTful que gestiona jugadores y equipos de baloncesto. Se implementan modelos, migraciones, relaciones, validaciones, recursos y controladores necesarios para un CRUD completo de las entidades `Player` y `Team`.

---

## 2. Creación del Proyecto y Configuración Inicial

Utilizamos el proyecto del tema anterior (TEAM 6 Seeder, Faker y Factory), nos vamos a la ruta del proyecto e instalamos API:

```php
php artisan install:api
```

![1748245460934](image/Readme/1748245460934.jpg)

---

## 3.Relaciones (Tabla Pivote) N:M

En la relacion trataremos de que los jugadores(**players**) puedan cambiarse de equipo(**team**) por lo cual debemos hacer una relacion **N:M** ya que muchos equipos pueden tener muchos jugadores y los jugadores pueden trasladarse a muchos equipos.

Empezamos creando la migracion de la tabala pivote (**equipo_jugador_table**).

```php
php artisan make:migration create_equipo_jugador_table
```

Y vamos a rellenar los campos:

![1748242742179](image/Readme/1748242742179.jpg)

`--> constrained(): Laravel asume que hace referencia a la tabla players y su campo id.`

`--> onDelete('cascade'): Si se elimina un jugador, se eliminan también sus registros en team_player. `

Tas crear las migraciones el siguiente punto es crear el controlador(**TeamPlayerController**).

![1748243107198](image/Readme/1748243107198.jpg)

![1748243142142](image/Readme/1748243142142.jpg)

Como resultado final:

![1748245429853](image/Readme/1748245429853.jpg)

---

## 4. Relaciones entre Modelos

### En `Team.php`

```php
 public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'team_player', 'team_id', 'player_id')
            ->withTimestamps();
    }
```

![1748245683428](image/Readme/1748245683428.jpg)

### En `Player.php`

```php
 public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_player' , 'player_id', 'team_id')
            ->withTimestamps();
    }
```

---

## 5. Rutas API

Creamos y editamos el archivo `routes/api.php`:

```php
Route::apiResource('teams', TeamController::class);
Route::apiResource('players', PlayerController::class);
```

![1748245819777](image/Readme/1748245819777.jpg)

---

## 6. Controladores

Modificamos los controladores:

Cada uno debe implementar los métodos: `index`, `store`, `show`, `update`, `destroy`.

**TeamController**

![1748246051882](image/Readme/1748246051882.jpg)

![1748246059862](image/Readme/1748246059862.jpg)

`Devuelve una respuesta JSON con:`

`Código 201 si fue exitoso.`

`Código 500 si ocurrió una excepción.`

![1748246065591](image/Readme/1748246065591.jpg)

![1748246072043](image/Readme/1748246072043.jpg)

---

## 7. Validaciones con Form Requests

Crear los requests:

```php
php artisan make:request TeamRequest
php artisan make:request PlayerRequest
```

### Ejemplo de reglas para Team:

```php
 public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'founded' => 'required|date_format:Y-m-d', // Fecha de fundación en formato YYYY-MM-DD  
        ];
    }
```

![1748246540674](image/Readme/1748246540674.jpg)

---

## 8. API Resources

Crear resources:

```bash
php artisan make:resource TeamResource
php artisan make:resource PlayerResource
```

### Ejemplo de TeamResource:

```php
public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'mascot' => $this->mascot,
            'founded' => $this->founded,
            'championships' => $this->championships,
            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
```

![1748246611193](image/Readme/1748246611193.jpg)

---

## 9. Pruebas con Thunder Client / Postman

### * Probar endpoints como:

* `GET /api/teams`

  ![1748246695262](image/Readme/1748246695262.jpg)
* `POST /api/teams`

  ![1748246728715](image/Readme/1748246728715.jpg)
* `PUT /api/teams/61`

  ![1748246799856](image/Readme/1748246799856.jpg)
* `DELETE /api/teams/61Ç`

  ![1748246869327](image/Readme/1748246869327.jpg)
* **Asegurarse de usar formato JSON.**

  ![1748246953447](image/Readme/1748246953447.jpg)
