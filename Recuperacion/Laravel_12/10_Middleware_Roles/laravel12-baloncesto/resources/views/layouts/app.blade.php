<!-- resources/views/layouts/basketball.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Basketball League')</title>

    <!-- Tailwind CDN para facilitar -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f7f1e3 0%, #d35400 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        nav {
            background-color: #d35400; /* naranja cancha */
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        a {
            transition: color 0.3s;
        }
        a:hover {
            color: #f39c12;
        }
        .btn-primary {
            background-color: #f39c12; /* amarillo */
            color: #1e1e1e;
        }
        .btn-primary:hover {
            background-color: #e67e22;
            color: white;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<nav class="px-6 py-4 flex justify-between items-center text-white font-semibold uppercase tracking-wide">
    <a href="{{ url('/') }}" class="text-2xl font-bold flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke="orange" stroke-width="2" fill="none"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20m10-10H2" />
        </svg>
        <span>Basketball League</span>
    </a>

    <div class="space-x-6 flex items-center">
        <a href="{{ route('equipos.index') }}" class="hover:text-yellow-300">Equipos</a>
        <a href="{{ route('jugadores.index') }}" class="hover:text-yellow-300">Jugadores</a>

        @auth
            <span class="text-yellow-300">Hola, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-yellow-300">Salir</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:text-yellow-300">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="hover:text-yellow-300">Registro</a>
        @endauth
    </div>
</nav>

<main class="flex-grow container mx-auto px-6 py-8 bg-white bg-opacity-90 rounded-lg shadow-lg">
    @yield('content')
</main>

<footer class="bg-orange-700 text-yellow-300 text-center py-4 mt-12 font-semibold uppercase tracking-wider">
    &copy; {{ date('Y') }} Basketball League. Todos los derechos reservados.
</footer>

</body>
</html>
