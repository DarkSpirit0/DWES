@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipo</h1>

    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del equipo</label>
            <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" name="city" class="form-control" value="{{ $team->city }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
