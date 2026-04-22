<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Método para LISTAR todas las notas (GET)
    public function index()
    {
        // Traemos todas las notas ordenadas desde la más nueva a la más vieja
        $notes = Note::orderBy('created_at', 'desc')->get();
        return response()->json($notes, 200);
    }

    // Método para CREAR una nueva nota (POST)
    public function store(Request $request)
    {
        // Validación del backend
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Guardamos en la base de datos
        $note = Note::create($validatedData);

        // Devolvemos la nota recién creada con un mensaje de éxito (código 201)
        return response()->json([
            'message' => 'Nota creada con éxito',
            'note' => $note
        ], 201);
    }

    public function destroy($id)
    {
        // Buscamos la nota por su ID
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        // Si la encuentra, la borra
        $note->delete();

        return response()->json(['message' => 'Nota eliminada correctamente'], 200);
    }
}
