@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1>Equipos</h1>
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coach'))
        <a href="{{ route('equipos.create') }}" class="btn btn-primary">Crear Equipo</a>
    @endif
</div>

@if($equipos->count())
<table>
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipos as $equipo)
        <tr>
            <td>{{ $equipo->id }}</td>
            <td>{{ $equipo->nombre }}</td>
            <td>
                <a href="{{ route('equipos.edit', $equipo) }}">Editar</a> |
                <form method="POST" action="{{ route('equipos.destroy', $equipo) }}" style="display:inline" onsubmit="return confirm('Eliminar equipo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No hay equipos aún.</p>
@endif
@endsection
