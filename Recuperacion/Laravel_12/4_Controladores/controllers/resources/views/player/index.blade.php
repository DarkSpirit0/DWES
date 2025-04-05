
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Jugadores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Lista de Jugadores</h1>

    <ul>
        @forelse($players as $player)
            <li>{{ $player->name }} — Edad: {{ $player->age }} años - Posición: {{ $player->position }} - Equipo: {{ $player->team }}</li>
        @empty
            <li>No hay jugadores registrados.</li>
        @endforelse
    </ul>
</body>
</html>
