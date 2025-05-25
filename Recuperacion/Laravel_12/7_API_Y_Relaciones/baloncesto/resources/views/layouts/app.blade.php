<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Basketball App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🏀 Basketball App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teams.index') }}">Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('players.index') }}">Jugadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team_player.index') }}">Gestión Jugador - Equipo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    {{-- Mensajes flash --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
