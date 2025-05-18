# Proyecto Laravel con Seeders, Factories y Faker

## Índice

1. [Introducción](#introducción)
2. [Proyecto Base](#proyecto-base)
3. [Seeders](#seeders)
4. [Factory](#factory)
5. [Faker](#faker)

## Introducción

Este proyecto muestra cómo estructurar y poblar una base de datos en Laravel usando migraciones, seeders, factories y Faker. Ideal para pruebas y desarrollo rápido con datos realistas.

### Otros recursos

- Documentación oficial de Laravel
- Documentacion del profesor
- Videos tutoriales

## Proyecto Base

1. Utilizamos el proyecto anterior (el del punto 5 CRUD).

## Seeders

- Creamos seeder tanto para jugadores como para equipos:
  ```bash
  php artisan make:seeder PLayerSeeder
  ```
- Editar `DatabaseSeeder.php` para llamar al seeder:
  ```php
  public function run(): void
      {
         $this->call([
              TeamSeeder::class,
              PlayerSeeder::class,
          ]);
      }
  ```
- Ejecutar seeder:
  ```bash
  php artisan db:seed
  ```

## Factory

- Creamos loa factory:
  ```bash
  php artisan make:factory TeamFactory
  ```
- Definir datos aleatorios:
  ```php
  public function definition(): array
      {
          return [
              'name' => $this->faker->word(),
              'city' => $this->faker->city(),
              'mascot' => $this->faker->word(),
              'founded' => $this->faker->year(),
              'championships' => $this->faker->numberBetween(0, 10),
          ];
  ```
- En `TeamSeeder`, usar factory:
  ```php
  public function run(): void
      {
          \App\Models\Team::factory()->count(10)->create();
      }
  }
  ```

## Faker

- Mejorar el factory con datos realistas:
  ```php
  public function definition(): array
      {
          return [
              'name' => $this->faker->name(),
              'edad' => $this->faker->numberBetween(18, 40),
              'position' => $this->faker->randomElement(['Base', 'Escolta', 'Alero', 'Ala-pivot', 'Pivot']),
              'height' => $this->faker->numberBetween(150, 220),
              'weight' => $this->faker->numberBetween(50, 120),
              'team_id' => \App\Models\Team::factory(),
          ];
      }
  ```

## Vista y Estilos

La unica modificación que hemos tocado en las vistas con respecto al proyecto anteriro es que hemos añadido algunos campos mas en jugadores y equipos para que tuviera mas contenido.

## Comandos Útiles

```bash
php artisan serve                  # Iniciar servidor local
php artisan migrate                # Migrar base de datos
php artisan migrate:rollback      # Revertir migraciones
php artisan db:seed               # Ejecutar seeders
php artisan db:seed --class=ProductSeeder # Seeder específico
```
