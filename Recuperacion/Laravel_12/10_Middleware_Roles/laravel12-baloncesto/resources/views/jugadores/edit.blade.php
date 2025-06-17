<!-- resources/views/jugadores/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Editar Jugador')

@section('content')
<h1 class="text-3xl font-bold mb-6">Editar Jugador</h1>

<form action="{{ route('jugadores.update', $jugador) }}" method="POST" class="max-w-md">
    @csrf
    @method('PUT')

    <label for="nombre" class="block mb-2 font-semibold">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $jugador->nombre) }}"
        class="w-full border px-3 py-2 rounded mb-4 @error('nombre') border-red-500 @enderror" />
    @error('nombre')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <label for="equipos" class="block mb-2 font-semibold">Equipos</label>
    <select name="equipos[]" id="equipos" multiple
        class="w-full border px-3 py-2 rounded mb-4 @error('equipos') border-red-500 @enderror">
        @foreach($equipos as $equipo)
            <option value="{{ $equipo->id }}"
                {{ (in_array($equipo->id, old('equipos', $jugador->equipos->pluck('id')->toArray()))) ? 'selected' : '' }}>
                {{ $equipo->nombre }}
            </option>
        @endforeach
    </select>
    @error('equipos')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Actualizar
    </button>
    <a href="{{ route('jugadores.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
</form>
@endsection
