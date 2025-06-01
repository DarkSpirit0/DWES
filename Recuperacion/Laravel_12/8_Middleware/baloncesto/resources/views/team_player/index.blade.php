@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestionar jugadores por equipo</h1>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    {{-- Seleccionar equipo para ver jugadores asociados --}}
    <form method="GET" action="{{ route('team_player.index') }}" class="mb-4">
        <div class="form-group">
            <label for="team_id_select">Seleccionar Equipo</label>
            <select name="team_id" id="team_id_select" class="form-control" onchange="this.form.submit()">
                <option value="">-- Elige un equipo --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ (isset($selectedTeam) && $selectedTeam->id == $team->id) ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    @if(isset($selectedTeam))
        <h3>Asignar jugador al equipo: {{ $selectedTeam->name }}</h3>

        {{-- Formulario para asociar jugador --}}
        <form action="{{ route('team_player.attach') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="team_id" value="{{ $selectedTeam->id }}">

            <div class="form-group">
                <label for="player_id">Seleccionar jugador</label>
                <select name="player_id" id="player_id" class="form-control" required>
                    <option value="">-- Elige un jugador --</option>
                    @foreach($players as $player)
                        {{-- Opcional: mostrar solo jugadores que no estén asociados al equipo --}}
                        @if(!$associatedPlayers->contains($player->id))
                            <option value="{{ $player->id }}">{{ $player->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Asignar jugador</button>
        </form>

        {{-- Listado de jugadores asociados con opción para desasociar --}}
        <h3>Jugadores asignados a {{ $selectedTeam->name }}</h3>
        @if($associatedPlayers->isEmpty())
            <p>No hay jugadores asignados a este equipo.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($associatedPlayers as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>
                                <form action="{{ route('team_player.detach') }}" method="POST" onsubmit="return confirm('¿Desasociar jugador?')">
                                    @csrf
                                    <input type="hidden" name="team_id" value="{{ $selectedTeam->id }}">
                                    <input type="hidden" name="player_id" value="{{ $player->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Desasociar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection
