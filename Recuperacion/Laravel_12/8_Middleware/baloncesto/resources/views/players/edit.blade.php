@extends('layouts.app')

@section('title', 'Editar Jugador')

@section('content')
    <h1>Editar Jugador</h1>

    <form method="POST" action="{{ route('players.update', $player) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre del Jugador</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $player->name) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
