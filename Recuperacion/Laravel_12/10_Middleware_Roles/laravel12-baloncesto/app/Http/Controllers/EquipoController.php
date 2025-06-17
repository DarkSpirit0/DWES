<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
{
    $equipos = Equipo::all();
    return view('equipos.index', compact('equipos'));
}


    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        Equipo::create($request->only('nombre'));
        return redirect()->route('equipos.index');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

   public function update(Request $request, Equipo $equipo)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $equipo->nombre = $request->nombre;
    $equipo->save();

    return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
}


    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index');
    }
}
