<?php
namespace app\Http\Controllers\API;

use app\Http\Controllers\Controller;
use app\Models\Player;
use Illuminate\Http\Request;

class PlayerApiController extends Controller
{
    public function index()
    {
        return response()->json(Player::all());
    }

    public function show(Player $player)
    {
        return response()->json($player);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $player = Player::create($validated);
        return response()->json($player, 201);
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $player->update($validated);
        return response()->json($player);
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json(null, 204);
    }
}
