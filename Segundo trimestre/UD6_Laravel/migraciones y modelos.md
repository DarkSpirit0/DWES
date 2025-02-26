# Migraciones y Modelos en Laravel

## Introducción

Este documento resume el contenido del episodio 3 del Curso Profesional de Laravel, abordando en profundidad el uso de migraciones y modelos en Laravel, y cómo gestionar la persistencia de datos con herramientas del framework.

## Configuración De La Capa De Persistencia

### Creación de un nuevo proyecto Laravel

Ejecutamos el siguiente comando para crear un nuevo proyecto llamado `modeldata` sin el starter kit:

```sh
laravel new modeldata
```

Laravel nos preguntará si queremos ejecutar las migraciones iniciales. Seleccionamos  **NO** , ya que gestionaremos la persistencia manualmente.

### Configuración de la base de datos

En el archivo `.env`, especificamos el sistema de base de datos que utilizaremos. En este tutorial, usaremos SQLite en lugar de MySQL. Podemos ver más detalles en `/config/database.php`.

## Migraciones

### Ejecutar migraciones

Para ejecutar las migraciones y crear las tablas en la base de datos:

```sh
php artisan migrate
```

Si ejecutamos nuevamente el comando y no hay cambios, Laravel indicará:

```
INFO Nothing to migrate.
```

### Crear una migración

Para generar un nuevo archivo de migración:

```sh
php artisan make:migration create_notes_table
```

Esto generará un archivo en `database/migrations/` con la estructura base para la tabla `notes`.

### Estructura de una migración

El archivo de migración generado extiende la clase `Migration` y contiene dos métodos principales:

* `up`: Define la creación de la tabla.
* `down`: Define la eliminación de la tabla en caso de rollback.

Ejemplo de código:

```php
Schema::create('notes', function (Blueprint $table) {
    $table->id();
    $table->string('description', 255)->nullable();
    $table->boolean('done')->default(false);
    $table->timestamps();
});
```

### Rollback de migraciones

Si es necesario deshacer la última migración:

```sh
php artisan migrate:rollback
```

Para eliminar todas las migraciones:

```sh
php artisan migrate:reset
```

Para refrescar todas las migraciones (eliminarlas y volver a ejecutarlas):

```sh
php artisan migrate:refresh
```

### Actualización de tablas mediante migraciones

En lugar de modificar directamente la base de datos, generamos una nueva migración para actualizar la estructura:

```sh
php artisan make:migration update_notes_table
```

Ejemplo de actualización en el archivo de migración:

```php
Schema::table('notes', function (Blueprint $table) {
    $table->string('author'); // Agregar una nueva columna
    $table->dropColumn(['deadline']); // Eliminar una columna
});
```

## Modelos

### Creación de un modelo

Los modelos en Laravel permiten interactuar con la base de datos mediante objetos. Para crear un modelo:

```sh
php artisan make:model Note
```

Esto genera `app/Models/Note.php`, una clase que extiende `Model`.

### Convenciones de nomenclatura

Por defecto, Laravel asocia el modelo `Note` con la tabla `notes`. Si usamos un nombre diferente, podemos especificarlo en el modelo:

```php
class Note extends Model {
    protected $table = 'notas';
}
```

### Propiedades importantes de un modelo

* **`fillable`** : Define los atributos que pueden asignarse en masa.
* **`guarded`** : Define los atributos protegidos contra asignación masiva.
* **`casts`** : Convierte tipos de datos (ejemplo: `date` para fechas).
* **`hidden`** : Oculta atributos en respuestas JSON (ejemplo: `password`).

Ejemplo de modelo:

```php
class Note extends Model {
    protected $fillable = ['description', 'done', 'author'];
    protected $casts = ['done' => 'boolean'];
}
```

### Creación de modelos con migraciones en un solo paso

Podemos crear un modelo junto con su migración:

```sh
php artisan make:model Author --migration
```

También se pueden generar otros elementos adicionales, como controladores, fábricas y seeders:

```sh
php artisan make:model Flight --all
```

## Conclusiones

En este documento hemos aprendido a:

* Configurar la base de datos en Laravel.
* Crear, ejecutar y gestionar migraciones.
* Entender los modelos y su relación con la base de datos.

En el siguiente paso, veremos cómo los controladores permiten conectar los modelos con las vistas y gestionar la lógica de negocio.
