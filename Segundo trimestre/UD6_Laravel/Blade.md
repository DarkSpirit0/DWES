# BLADE en Laravel

## Introducción

En este tutorial aprenderemos a crear vistas en Laravel utilizando buenas prácticas mediante el motor de plantillas  **Blade** .

### Comenzando con Laravel y Blade

Para comenzar, creamos un nuevo proyecto de Laravel ejecutando:

```bash
laravel new blade
```

Opciones disponibles:

* `none` (starter kit Jetstream...)
* `PhpUnit`
* `sqlite`

---

## 1. Layouts

Las vistas en Laravel pueden compartir una gran cantidad de código repetido. Para evitar esto, se recomienda usar  **layouts** .

Creamos un nuevo layout en `views/layouts/landing.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
```

Cada vez que Blade deba procesar algo, utilizamos la directiva `@`.

Ejemplo de una vista que extiende este layout (`views/index.blade.php`):

```blade
@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <h1>Home</h1>
    <p>Esta es la página de inicio.</p>
@endsection
```

---

## 2. Parciales

Para reutilizar partes comunes del código, creamos componentes parciales.

Ejemplo de un menú en `views/layouts/_partials/menu.blade.php`:

```blade
<header>
    <nav>
        <ul>
            <li><a href="{{ route('index') }}">Index</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
</header>
```

Luego lo incluimos en el layout:

```blade
@include('layouts._partials.menu')
```

---

## 3. Rutas Nombradas

Para evitar rutas absolutas, usamos nombres en las rutas en `routes/web.php`:

```php
Route::view('/', 'index')->name('index');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');
```

---

## 4. Componentes Blade

Podemos definir componentes reutilizables, por ejemplo, tarjetas en `views/_components/card.blade.php`:

```blade
<div style="border: 1px solid #cd7979; margin: 10px; padding: 10px;">
    <h3>{{$title}}</h3>
    <p>{{$content}}</p>
</div>
```

Usamos `@component` en `views/services.blade.php`:

```blade
@component('_components.card')
    @slot('title', 'Service 1')
    @slot('content', 'Descripción del servicio 1')
@endcomponent
```

---

## 5. Recursos Estáticos

Para cargar recursos como CSS e imágenes, los colocamos en `public/assets/` y los referenciamos con `asset()`:

```blade
<img src="{{ asset('assets/img/image.png') }}" alt="Imagen" width="80px">
```

Para CSS, creamos `public/css/style.css` y lo incluimos en el layout:

```blade
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
```

Ejemplo de `style.css`:

```css
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}
h1 {
    color: #444;
}
```

---

## Conclusiones

Blade permite reutilizar y estructurar mejor las vistas en Laravel, evitando la repetición de código y mejorando el mantenimiento.

### Referencias:

* [Curso Profesional Laravel - Video 2 Blade](https://chatgpt.com/c/67bf5f52-35d4-800d-9ea5-48ef8bdd1089#)
* [Documentación Oficial Laravel](https://laravel.com/docs)
* [Bootcamp Laravel](https://laravel.com/bootcamp)
