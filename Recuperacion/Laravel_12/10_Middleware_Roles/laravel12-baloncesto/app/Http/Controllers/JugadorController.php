<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
         $jugadores = Jugador::with('equipos')->get();
    return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required',
        'equipos' => 'array|exists:equipos,id',
    ]);

    $jugador = Jugador::create(['nombre' => $request->nombre]);
    $jugador->equipos()->sync($request->equipos ?? []);

    return redirect()->route('jugadores.index');
}

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::all();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'equipos' => 'nullable|array',
        'equipos.*' => 'exists:equipos,id',
    ]);

    $jugador->nombre = $request->nombre;
    $jugador->save();

    // Sincronizar equipos relacionados (tabla pivote)
    $jugador->equipos()->sync($request->equipos ?? []);

    return redirect()->route('jugadores.index')->with('success', 'Jugador actualizado correctamente.');
}


    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
