<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamPlayerApiController extends Controller
{
    // Obtener jugadores asociados a un equipo específico
    public function index($teamId)
    {
        $team = Team::with('players')->find($teamId);

        if (!$team) {
            return response()->json([
                'message' => 'Equipo no encontrado.'
            ], 404);
        }

        return response()->json([
            'team' => $team->only(['id', 'name']), // Devuelve solo datos relevantes
            'players' => $team->players
        ]);
    }

    // Asociar jugador a equipo
    public function attach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $team = Team::find($request->team_id);
        $team->players()->syncWithoutDetaching([$request->player_id]);

        return response()->json([
            'message' => 'Jugador asignado correctamente.',
            'team_id' => $team->id,
            'player_id' => $request->player_id,
        ], 200);
    }

    // Desasociar jugador de equipo
    public function detach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $team = Team::find($request->team_id);
        $team->players()->detach($request->player_id);

        return response()->json([
            'message' => 'Jugador desasociado correctamente.',
            'team_id' => $team->id,
            'player_id' => $request->player_id,
        ], 200);
    }
}
