<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    // Mostrar formulario y jugadores asociados
    public function index(Request $request)
    {
        $teams = Team::all();
        $players = Player::all();

        // Si hay equipo seleccionado, traer sus jugadores asociados
        $selectedTeam = null;
        $associatedPlayers = collect();

        if ($request->has('team_id')) {
            $selectedTeam = Team::with('players')->find($request->team_id);
            if ($selectedTeam) {
                $associatedPlayers = $selectedTeam->players;
            }
        }

        return view('team_player.index', compact('teams', 'players', 'selectedTeam', 'associatedPlayers'));
    }

    public function attach(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
        ]);

        $team = Team::findOrFail($request->team_id);
        $team->players()->syncWithoutDetaching([$request->player_id]);

        return redirect()->route('team_player.index', ['team_id' => $request->team_id])
                         ->with('message', 'Jugador asignado correctamente.');
    }

    public function detach(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'player_id' => 'required|exists:players,id',
        ]);

        $team = Team::findOrFail($request->team_id);
        $team->players()->detach($request->player_id);

        return redirect()->route('team_player.index', ['team_id' => $request->team_id])
                         ->with('message', 'Jugador desasociado correctamente.');
    }
}
