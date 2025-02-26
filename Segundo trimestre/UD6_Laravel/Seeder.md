# **Seeder, Factory y Faker en Laravel**

## **Índice**

1. Introducción
   * 1.1 Autoría
   * 1.2 Enlaces a otros tutoriales
2. Proyecto base
3. Seeders
4. Factory
5. Faker
6. Conclusiones

---

## **1. Introducción**

### **Recapitulación**

En este tutorial trabajaremos con Seeders, Factories y Faker en Laravel para poblar nuestras bases de datos con datos de prueba.

* **Migraciones** : Estructura de la base de datos.
* **ORM** : Base para la manipulación de datos.
* **Seeders** : Nos permiten poblar nuestra base de datos con datos iniciales.
* **Factories** : Nos ayudan a generar datos de prueba de manera masiva.
* **Faker** : Proporciona datos falsos con sentido lógico para pruebas.

---

## **2. Proyecto base**

### **Creación del proyecto Laravel**

Ejecutamos el siguiente comando para crear un nuevo proyecto:

```bash
composer create-project laravel/laravel databases
laravel new databases && cd databases
```

### **Configuración de la base de datos**

Si usamos MySQL, debemos modificar el archivo `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databases
DB_USERNAME=root
DB_PASSWORD=root
```

---

## **3. Seeders**

### **Creación de un modelo con migración**

```bash
php artisan make:model Product --migration
```

**Modelo `Product.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
}
```

### **Migración `create_products_table.php`**

```php
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name', 50);
        $table->string('short_description', 100);
        $table->text('description');
        $table->float('price')->default(20);
        $table->timestamps();
    });
}
```

Ejecutamos las migraciones:

```bash
php artisan migrate
```

### **Creación del Seeder**

```bash
php artisan make:seeder ProductSeeder
```

Editamos `ProductSeeder.php`:

```php
public function run(): void
{
    Product::create([
        'name' => 'Example',
        'short_description' => 'Lorem Ipsum',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 42
    ]);
}
```

Añadimos el seeder en `DatabaseSeeder.php`:

```php
public function run(): void
{
    $this->call([
        ProductSeeder::class
    ]);
}
```

Ejecutamos el seeder:

```bash
php artisan db:seed
```

Si queremos ejecutar solo un seeder específico:

```bash
php artisan db:seed --class=ProductSeeder
```

---

## **4. Factory**

Generamos el Factory:

```bash
php artisan make:factory ProductFactory
```

Editamos `ProductFactory.php`:

```php
public function definition(): array
{
    return [
        'name' => Str::random(25),
        'short_description' => Str::random(45),
        'description' => Str::random(150),
        'price' => random_int(1, 125),
    ];
}
```

Modificamos `ProductSeeder.php` para usar la Factory:

```php
public function run(): void
{
    Product::factory()->count(150)->create();
}
```

Ejecutamos el seeder con los datos generados:

```bash
php artisan db:seed
```

---

## **5. Faker**

Modificamos `ProductFactory.php` para usar Faker:

```php
public function definition(): array
{
    return [
        'name' => fake()->name,
        'short_description' => fake()->sentence,
        'description' => fake()->paragraph(3),
        'price' => fake()->numberBetween(1, 125),
    ];
}
```

Ejecutamos las migraciones y seeders nuevamente:

```bash
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
```

Levantamos el servidor:

```bash
php artisan serve
```

---

## **6. Conclusiones**

Con este tutorial hemos aprendido:

* **Cómo usar Seeders para poblar la base de datos con datos iniciales.**
* **Cómo usar Factories para generar datos masivos de prueba.**
* **Cómo usar Faker para generar datos aleatorios y realistas.**

En los próximos temas veremos:

* **Relaciones 1:1, 1:N, N:M.**
* **Datos de pivotaje.**
* **Relaciones polimórficas.**
