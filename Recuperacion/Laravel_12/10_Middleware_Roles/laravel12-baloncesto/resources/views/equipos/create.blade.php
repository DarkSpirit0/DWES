<!-- resources/views/equipos/create.blade.php (y editar similar con método PUT) -->
@extends('layouts.app')

@section('title', isset($equipo) ? 'Editar Equipo' : 'Crear Equipo')

@section('content')
<h1 class="text-3xl font-bold mb-6">{{ isset($equipo) ? 'Editar Equipo' : 'Crear Equipo' }}</h1>

<form action="{{ isset($equipo) ? route('equipos.update', $equipo) : route('equipos.store') }}" method="POST" class="max-w-md">
    @csrf
    @if(isset($equipo))
        @method('PUT')
    @endif

    <label for="nombre" class="block mb-2 font-semibold">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $equipo->nombre ?? '') }}"
        class="w-full border px-3 py-2 rounded mb-4 @error('nombre') border-red-500 @enderror" />
    @error('nombre')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ isset($equipo) ? 'Actualizar' : 'Guardar' }}
    </button>
    <a href="{{ route('equipos.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
</form>
@endsection
