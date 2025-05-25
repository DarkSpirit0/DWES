@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Asignar Player a Team</h2>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para asignar --}}
    <form action="{{ route('team_player.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="player_id" class="form-label">Player</label>
            <select name="player_id" id="player_id" class="form-select" required>
                <option value="">Seleccione un Player</option>
                @foreach($players as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="team_id" class="form-label">Team</label>
            <select name="team_id" id="team_id" class="form-select" required>
                <option value="">Seleccione un Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>

    {{-- Tabla de relaciones Player-Team --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Player</th>
                <th>Team</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relations as $rel)
                <tr>
                    <td>{{ $rel->player_name }}</td>
                    <td>{{ $rel->team_name }}</td>
                    <td>
                        <form action="{{ route('team_player.destroy', $rel->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta asignación?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
