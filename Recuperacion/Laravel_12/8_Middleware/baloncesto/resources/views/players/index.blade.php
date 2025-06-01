@extends('layouts.app')

@section('title', 'Lista de Jugadores')

@section('content')
    <h1>Jugadores</h1>

    @auth
        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Crear Jugador</a>
    @endauth

    <ul class="list-group">
        @forelse ($players as $player)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('players.show', $player) }}">{{ $player->name }}</a>

                @auth
                    <div>
                        <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </div>
                @endauth
            </li>
        @empty
            <li class="list-group-item">No hay jugadores.</li>
        @endforelse
    </ul>
@endsection
