<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    // Listar todos los equipos
    public function index()
    {
        return response()->json(Team::all(), 200);
    }

    // Mostrar un equipo específico
    public function show(Team $team)
    {
        return response()->json($team, 200);
    }

    // Crear un nuevo equipo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'founded' => 'nullable|integer|min:1800|max:' . date('Y'),
        ]);

        $team = Team::create($validated);

        return response()->json([
            'message' => 'Equipo creado correctamente.',
            'team' => $team
        ], 201);
    }

    // Actualizar un equipo existente
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'founded' => 'nullable|integer|min:1800|max:' . date('Y'),
        ]);

        $team->update($validated);

        return response()->json([
            'message' => 'Equipo actualizado correctamente.',
            'team' => $team
        ], 200);
    }

    // Eliminar un equipo
    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json([
            'message' => 'Equipo eliminado correctamente.'
        ], 204);
    }
}
