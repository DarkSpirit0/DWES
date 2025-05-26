<?php
namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest; // Assuming you have a TeamRequest for validation
use App\Http\Resources\TeamResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamController extends Controller
{
    public function index(): JsonResource
    {
        $teams = Team::with('players')->get();
        return TeamResource::collection($teams); 

    }

    public function create()
    {
        return view('teams.create');
    }

public function store(Request $request): JsonResponse
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Team::create($request->all());

        return response()->json([
            'success' => true,
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function show(Team $team): JsonResource
    {
        return new TeamResource($team);
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $team->update($request->all());

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function destroy(Team $team): JsonResponse
    {
        $team->delete();

       return response()->json([
            'success' => true,
        ], 200);
    }
}
