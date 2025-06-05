@extends('layouts.app')

@section('title', 'Lista de Equipos')

@section('content')
    <h1>Equipos</h1>

    @auth
        <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Crear Equipo</a>
    @endauth

    <ul class="list-group">
        @forelse ($teams as $team)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('teams.show', $team) }}">{{ $team->name }}</a>

                @auth
                    <div>
                        <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </div>
                @endauth
            </li>
        @empty
            <li class="list-group-item">No hay equipos registrados.</li>
        @endforelse
    </ul>
@endsection
