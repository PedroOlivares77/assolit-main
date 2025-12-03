<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrabajadoresController extends Controller
{
    public function mostrarSocial()
    {
        $user = Auth::user();

        $usuarios = Usuario::whereHas('vivienda', function ($q) use ($user) {
            $q->where('viviendas.id', $user->viviendas->first()->id ?? 0);
        })->with('medicamentos')->get();

        return view('miAreaTrabajadorSocial', ['usuarios' => $usuarios]);
    }

    public function mostrarPsiquiatra()
    {
        $user = Auth::user();

        $viviendas_ids = $user->viviendas->pluck('id');
        $usuarios = Usuario::whereHas('vivienda', function ($q) use ($viviendas_ids) {
            $q->whereIn('viviendas.id', $viviendas_ids);
        })->with('medicamentos')->get();

        return view('miAreaPsiquiatra', ['usuarios' => $usuarios]);
    }
}
