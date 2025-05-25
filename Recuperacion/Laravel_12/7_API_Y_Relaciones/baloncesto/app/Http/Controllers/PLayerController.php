<?php
namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use APP\Http\Resources\PlayerResource; // Assuming you have a PlayerResource for API responses
use App\Http\Resources\TeamResource; // Assuming you have a TeamResource for API responses
use Illuminate\Database\Eloquent\Casts\Json;
use App\Http\Requests\PlayerRequest; // Assuming you have a PlayerRequest for validation
use App\Http\Requests\TeamRequest; // Assuming you have a TeamRequest for validation
class PlayerController extends Controller
{
    public function index(): JsonResource
    {
        $players = Player::with('team')->get();
        return PlayerResource::collection($players);
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->all());

        return response()->json([
            'success' => true,
        ], 201);
    }

    public function show(Player $player): JsonResource
    {
        return new PlayerResource($player);
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player->update($request->all());

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function destroy(Player $player): JsonResponse
    {
        $player->delete();

        return response()->json([
            'success' => true,
        ], 200);
    }
}
