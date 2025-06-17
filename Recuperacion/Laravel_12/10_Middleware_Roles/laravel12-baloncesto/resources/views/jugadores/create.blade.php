<!-- resources/views/jugadores/create.blade.php (y editar similar con método PUT) -->
@extends('layouts.app')

@section('title', isset($jugador) ? 'Editar Jugador' : 'Crear Jugador')

@section('content')
<h1 class="text-3xl font-bold mb-6">{{ isset($jugador) ? 'Editar Jugador' : 'Crear Jugador' }}</h1>

<form action="{{ isset($jugador) ? route('jugadores.update', $jugador) : route('jugadores.store') }}" method="POST" class="max-w-md">
    @csrf
    @if(isset($jugador))
        @method('PUT')
    @endif

    <label for="nombre" class="block mb-2 font-semibold">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $jugador->nombre ?? '') }}"
        class="w-full border px-3 py-2 rounded mb-4 @error('nombre') border-red-500 @enderror" />
    @error('nombre')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <label for="equipos" class="block mb-2 font-semibold">Equipos</label>
    <select name="equipos[]" id="equipos" multiple
        class="w-full border px-3 py-2 rounded mb-4 @error('equipos') border-red-500 @enderror">
        @foreach($equipos as $equipo)
            <option value="{{ $equipo->id }}"
                {{ (in_array($equipo->id, old('equipos', isset($jugador) ? $jugador->equipos->pluck('id')->toArray() : []))) ? 'selected' : '' }}>
                {{ $equipo->nombre }}
            </option>
        @endforeach
    </select>
    @error('equipos')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ isset($jugador) ? 'Actualizar' : 'Guardar' }}
    </button>
    <a href="{{ route('jugadores.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
</form>
@endsection
