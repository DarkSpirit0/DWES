@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Equipos</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Crear Equipo</a>

    @foreach ($teams as $team)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $team->name }} ({{ $team->city }})</h5>
                <a href="{{ route('teams.show', $team) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
