<?php
namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->all());

        return redirect()->route('players.index')->with('success', 'Jugador creado correctamente.');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player->update($request->all());

        return redirect()->route('players.index')->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Jugador eliminado.');
    }
}
