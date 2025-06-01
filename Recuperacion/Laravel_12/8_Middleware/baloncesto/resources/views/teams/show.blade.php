@extends('layouts.app')

@section('title', 'Detalle del Equipo')

@section('content')
    <h1>{{ $team->name }}</h1>

    <p><strong>ID:</strong> {{ $team->id }}</p>
    <p><strong>Jugadores:</strong></p>
    <ul>
        @forelse ($team->players as $player)
            <li>{{ $player->name }}</li>
        @empty
            <li>No hay jugadores asignados.</li>
        @endforelse
    </ul>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Volver</a>
@endsection
