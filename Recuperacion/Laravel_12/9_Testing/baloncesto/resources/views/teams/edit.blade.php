@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h1>Editar Equipo</h1>

    <form method="POST" action="{{ route('teams.update', $team) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre del Equipo</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
        </div>
        <button class="btn btn-success">Actualizar</button>
    </form>
@endsection
