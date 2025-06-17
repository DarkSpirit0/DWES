<!-- resources/views/equipos/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
<h1 class="text-3xl font-bold mb-6">Editar Equipo</h1>

<form action="{{ route('equipos.update', $equipo) }}" method="POST" class="max-w-md">
    @csrf
    @method('PUT')

    <label for="nombre" class="block mb-2 font-semibold">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $equipo->nombre) }}"
        class="w-full border px-3 py-2 rounded mb-4 @error('nombre') border-red-500 @enderror" />
    @error('nombre')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <button type="subm
