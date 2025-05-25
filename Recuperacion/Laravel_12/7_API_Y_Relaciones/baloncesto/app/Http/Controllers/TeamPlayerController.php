<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Team;

class TeamPlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        $teams = Team::all();

        $relations = DB::table('team_player')
            ->join('players', 'players.id', '=', 'team_player.player_id')
            ->join('teams', 'teams.id', '=', 'team_player.team_id')
            ->select('team_player.id', 'players.name as player_name', 'teams.name as team_name')
            ->get();

        return view('team_player.index', compact('players', 'teams', 'relations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
        ]);

        DB::table('team_player')->insert([
            'player_id' => $request->player_id,
            'team_id' => $request->team_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('team_player.index')->with('success', 'Jugador asignado al equipo correctamente');
    }

    public function destroy($id)
    {
        DB::table('team_player')->where('id', $id)->delete();

        return redirect()->route('team_player.index')->with('success', 'Relación eliminada correctamente');
    }
}
