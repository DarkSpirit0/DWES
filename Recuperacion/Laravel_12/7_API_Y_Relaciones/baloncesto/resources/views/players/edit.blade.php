@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jugador</h1>

    <form action="{{ route('players.update', $player) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del jugador</label>
            <input type="text" name="name" class="form-control" value="{{ $player->name }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Posición</label>
            <input type="text" name="position" class="form-control" value="{{ $player->position }}" required>
        </div>

        <div class="mb-3">
            <label for="team_id" class="form-label">Equipo</label>
            <select name="team_id" class="form-control" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
