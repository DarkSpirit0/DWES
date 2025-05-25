@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jugadores</h1>
    <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Agregar Jugador</a>

    @foreach ($players as $player)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $player->name }} ({{ $player->position }})</h5>
                <p>Equipo: {{ $player->team->name }}</p>
                <a href="{{ route('players.show', $player) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('players.edit', $player) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('players.destroy', $player) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
