<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest; // Asegúrate de que la ruta del Request sea correcta
use Illuminate\Http\Request;
use App\Models\Note; // Importamos el modelo
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Recuperamos todos los elementos
        $notes = Note::all();
        // Ahora ya no devolvemos una vista (return view) sino que directamente enviamos esos datos mediante un formato de API RESTFUL con JSON
        return response()->json(Note::all(), 200);
          /*  JSON Le devolvemos:
                //datos
                //mensaje de estado, 200 = todo OK
                //valor de cabecera (opcional)
          */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        Note::create($request->all());
        return response()->json([
            'success' => true
        ], 201); // El estado 201 corresponde a la creación correcta de un nuevo elemento
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Busca un elemento con su ID y lo devuelve
        $note= Note::find($id);
        return response()->json($note, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
  
    public function update(Request $request, string $id)
    {
        $note= Note::find($id);
        //podemos usar el Note::update
        //O para ver la opción directa, lo hacemos:
        $note->title= $request->title;
        $note->content= $request->content;
        $note->save(); // Si lo hacemos así, necesitamos guardar
        return response()->json([
            'success' => true  
        ],204); // El estado 204 corresponde a la creación correcta de u nuevo elemento
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Buscamos el elemento a borrar
        $note= Note::find($id);
        $note->delete(); // Borramos el elemento
        return response()->json([
            'success' => true  
        ],200); // El estado 204 corresponde a la creación correcta de u nuevo elemento
    }
}
