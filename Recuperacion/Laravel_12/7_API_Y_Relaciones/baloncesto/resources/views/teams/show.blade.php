@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $team->name }}</h1>
    <p>Ciudad: {{ $team->city }}</p>
    <p>Campeonatos ganados: {{ $team->championships }}</p>
    <p>mascota: {{ $team->mascot }}</p>
    <p>Ano de fundación: {{ $team->founded }}</p>

    <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
