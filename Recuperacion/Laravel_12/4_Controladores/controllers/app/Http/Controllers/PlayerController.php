<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::where('age', '>', 18)
            ->where('age', '<', 30)
            ->orderBy('name', 'asc')
            ->orderBy('age', 'desc')
            ->get();
        return view('player.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Player::create([
            'name' => 'John Doe',
            'age' => 25,
            'position' => 'Shooting Guard',
            'height' => 180,
            'weight' => 75,
            'team' => 'Laker',
        ]);
        Player::create([
            'name' => 'Jane Smith',
            'age' => 28,
            'position' => 'Point Guard',
            'height' => 170,
            'weight' => 65,
            'team' => 'Warriors',
        ]);
        return redirect()->route('player.index')->with('success', 'Players created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
