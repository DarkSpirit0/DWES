@extends('layouts.app')

@section('title', 'Detalles del Jugador')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Jugador: {{ $jugador->nombre }}</h1>

    <a href="{{ route('jugadores.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Volver a lista</a>

    <h2 class="text-2xl font-semibold mb-2">Equipos asociados</h2>
    @if($jugador->equipos->count())
        <ul class="list-disc pl-6">
            @foreach($jugador->equipos as $equipo)
                <li>{{ $equipo->nombre }}</li>
            @endforeach
        </ul>
    @else
        <p>No está asociado a ningún equipo.</p>
    @endif
@endsection
