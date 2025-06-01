@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')
    <h1>Crear Equipo</h1>

    <form method="POST" action="{{ route('teams.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre del Equipo</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>
@endsection
