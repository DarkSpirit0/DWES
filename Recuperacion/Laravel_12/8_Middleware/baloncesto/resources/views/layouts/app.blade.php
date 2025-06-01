<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Liga de Baloncesto')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <div class="menu-links">
            <a href="{{ url('/') }}" class="logo-text">BasketLiga</a>
            <a href="{{ route('teams.index') }}">Equipos</a>
            <a href="{{ route('players.index') }}">Jugadores</a>
            @auth
               <a href="{{ route('team_player.index') }}">Asignaciones</a>
            @endauth
        </div>

        <div class="auth-links">
            @auth
                <span class="text-sm">Hola, {{ Auth::user()->name }}</span>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="hover:text-orange-400 transition bg-transparent border-none cursor-pointer text-white font-semibold">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 transition">Registrarse</a>
            @endauth
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        © {{ date('Y') }} - BasketLiga - Todos los derechos reservados
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
