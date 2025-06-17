@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1>Jugadores</h1>
    <a href="{{ route('jugadores.create') }}" class="btn btn-primary">Crear Jugador</a>
</div>

@if($jugadores->count())
<table>
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Equipos</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jugadores as $jugador)
        <tr>
            <td>{{ $jugador->id }}</td>
            <td>{{ $jugador->nombre }}</td>
            <td>
                @foreach($jugador->equipos as $equipo)
                    <span>{{ $equipo->nombre }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('jugadores.edit', $jugador) }}">Editar</a> |
                <form method="POST" action="{{ route('jugadores.destroy', $jugador) }}" style="display:inline" onsubmit="return confirm('Eliminar jugador?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No hay jugadores aún.</p>
@endif
@endsection
