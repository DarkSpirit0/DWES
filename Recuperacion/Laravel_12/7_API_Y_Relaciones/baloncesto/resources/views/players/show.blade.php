@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $player->name }}</h1>
    <p>Posición: {{ $player->position }}</p>
    <p>Equipo: {{ $player->team->name }}</p>

    <a href="{{ route('players.edit', $player) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('players.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
