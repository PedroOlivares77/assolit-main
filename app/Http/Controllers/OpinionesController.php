<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionesController extends Controller
{
    public function mostrar()
    {
        $opiniones = Opinion::all();
        return view('opiniones', ['opiniones' => $opiniones]);
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'id_vivienda' => ['required', 'integer'],
            'comentario' => ['required', 'string'],
            'valoracion' => ['required', 'integer'],
            'autor' => ['required', 'string'],
        ]);

        $opinion = new Opinion();
        $opinion->comentario = $request->comentario;
        $opinion->valoracion = $request->valoracion;
        $opinion->autor = $request->autor;
        $opinion->id_vivienda = $request->id_vivienda;
        $opinion->save();

        return redirect()->back();
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'comentario' => ['required', 'string'],
            'valoracion' => ['required', 'integer'],
            'autor' => ['required', 'string'],
        ]);

        $opinion = Opinion::findOrFail($id);
        $opinion->comentario = $request->comentario;
        $opinion->valoracion = $request->valoracion;
        $opinion->autor = $request->autor;
        $opinion->save();

        return redirect()->back();
    }

    public function eliminar($id)
    {
        $opinion = Opinion::findOrFail($id);
        $opinion->delete();

        return redirect()->back();
    }
}