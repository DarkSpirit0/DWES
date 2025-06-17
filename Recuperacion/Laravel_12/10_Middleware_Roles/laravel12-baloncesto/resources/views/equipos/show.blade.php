@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Equipo: {{ $equipo->nombre }}</h1>

    <a href="{{ route('equipos.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Volver a lista</a>

    <h2 class="text-2xl font-semibold mb-2">Jugadores asociados</h2>
    @if($equipo->jugadores->count())
        <ul class="list-disc pl-6">
            @foreach($equipo->jugadores as $jugador)
                <li>{{ $jugador->nombre }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay jugadores asociados a este equipo.</p>
    @endif
@endsection
