@extends('layouts.app')

@section('title', 'Crear Jugador')

@section('content')
    <h1>Crear Jugador</h1>

    <form method="POST" action="{{ route('players.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>
@endsection
