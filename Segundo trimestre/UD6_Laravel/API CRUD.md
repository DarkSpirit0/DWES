# API CRUD en Laravel

Este proyecto implementa una API CRUD usando Laravel, que permite gestionar notas mediante las operaciones básicas de crear, leer, actualizar y eliminar (CRUD). La API está diseñada para servir datos a clientes front-end, como aplicaciones construidas con React, Vue, entre otros.

## Tabla de Contenidos

1. [Introducción](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#introducci%C3%B3n)
2. [Creación de la API y Rutas](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#creaci%C3%B3n-de-la-api-y-rutas)
3. [Modelo y Migración](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#modelo-y-migraci%C3%B3n)
4. [Controlador API y Rutas](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#controlador-api-y-rutas)
5. [Tipado y Refactorización](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#tipado-y-refactorizaci%C3%B3n)
6. [API Resource](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#api-resource)
7. [Prueba de Funcionamiento](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#prueba-de-funcionamiento)
8. [Conclusiones](https://chatgpt.com/c/67bf63c5-807c-800d-a98c-3f9d189d6ce2#conclusiones)

---

## Introducción

Laravel nos permite crear una API RESTful, que puede ser consumida por un cliente front-end (por ejemplo, en React o Vue). Este tutorial cubre la creación de una API CRUD con Laravel, utilizando rutas y controladores, y cómo interactuar con una base de datos MySQL o SQLite.

---

## Creación de la API y Rutas

1. **Instalación de Laravel:**
   ```bash
   composer create-project laravel/laravel apicrud
   ```
2. **Instalar API (para Laravel 11):**
   ```bash
   php artisan install:api
   ```
3. **Base de Datos:**
   Configura la base de datos en el archivo `.env`:
   ```ini
   DB_CONNECTION=sqlite
   ```
4. **Crear el modelo y migración para `Note`:**
   ```bash
   php artisan make:model Note --migration
   ```

---

## Modelo y Migración

El modelo `Note` define los campos accesibles y protegidos.

```php
class Note extends Model
{
    use HasFactory;
    protected $guarded = []; // Permite que todos los campos sean cumplimentables
}
```

La migración crea la tabla `notes` en la base de datos:

```php
Schema::create('notes', function (Blueprint $table) {
    $table->id();
    $table->string('title', 255);
    $table->string('content', 255)->nullable();
    $table->timestamps();
});
```

---

## Controlador API y Rutas

1. **Creación del controlador:**
   ```bash
   php artisan make:controller NoteController --resource
   ```
2. **Definición de rutas en `api.php`:**
   En el archivo `routes/api.php`, se agregan las rutas para la API.
   ```php
   Route::resource('note', NoteController::class);
   ```

---

## Tipado y Refactorización

En el controlador, es útil usar tipado para mejorar la legibilidad y mantenimiento del código. Se recomienda usar `JsonResponse` en lugar de retornar datos sin especificar el tipo.

```php
public function index(): JsonResponse
{
    return response()->json(Note::all(), 200);
}
```

---

## API Resource

Para personalizar la respuesta, se utilizan  **API Resources** . Esto permite modificar la estructura de los datos antes de devolverlos, ideal para formatear campos o incluir datos adicionales.

1. **Creación del Resource:**
   ```bash
   php artisan make:resource NoteResource
   ```
2. **Definición de `NoteResource`:**
   ```php
   public function toArray($request): array
   {
       return [
           'id' => $this->id,
           'title' => 'Title: ' . $this->title,
           'content' => $this->content,
           'example' => 'This is an example'
       ];
   }
   ```
3. **Modificar el controlador para usar `NoteResource`:**
   ```php
   public function index(): JsonResource
   {
       return NoteResource::collection(Note::all());
   }

   public function store(NoteRequest $request): JsonResponse
   {
       $note = Note::create($request->all());
       return response()->json([
           'success' => true,
           'data' => new NoteResource($note)
       ], 201);
   }
   ```

---

## Prueba de Funcionamiento

Utiliza herramientas como **ThunderClient** o **Postman** para probar los endpoints de la API. Asegúrate de que los métodos `GET`, `POST`, `PUT`, y `DELETE` funcionen correctamente con la estructura de datos esperada.

1. **Ejemplo de cuerpo para crear una nota (POST):**
   ```json
   {
       "title": "Hello World",
       "content": "Lorem Ipsum"
   }
   ```
2. **Verifica las respuestas de las rutas** con las herramientas mencionadas, revisando los datos devueltos.
