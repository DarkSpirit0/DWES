@extends('layouts.app')

@section('title', 'Detalle del Jugador')

@section('content')
    <h1>{{ $player->name }}</h1>

    <p><strong>ID:</strong> {{ $player->id }}</p>
    <p><strong>Creado:</strong> {{ $player->created_at }}</p>

    <a href="{{ route('players.index') }}" class="btn btn-secondary">Volver</a>
@endsection
