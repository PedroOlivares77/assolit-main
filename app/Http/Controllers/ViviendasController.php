<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use App\Models\Vivienda;
use Illuminate\Http\Request;

class ViviendasController extends Controller
{
    public function mostrar()
    {
        $viviendas = Vivienda::all();
        return view('viviendas', ['viviendas' => $viviendas]);
    }

    public function mostrarFormEd($id = null)
    {
        $vivienda = $id ? Vivienda::find($id) : null;

        // SOLO Users con rol 2 y 3
        $usersDisponibles = User::whereIn('id_rol', [2, 3])->get();

        // SOLO pacientes que no están en vivienda alguna
        $usuariosDisponibles = Usuario::where(function ($q) use ($vivienda) {
            $q->whereNull('id_vivienda'); // sin vivienda
            if ($vivienda) {
                $q->orWhere('id_vivienda', $vivienda->id); // o ya asignados a esta vivienda
            }
        })->get();

        // Los asignados en edición
        $usersAsignados = $vivienda ? $vivienda->users()->pluck('users.id') : collect();
        $usuariosAsignados = $vivienda ? Usuario::where('id_vivienda', $vivienda->id)->pluck('id') : collect();

        return view('formularioVivienda', compact(
            'vivienda',
            'usersDisponibles',
            'usersAsignados',
            'usuariosDisponibles',
            'usuariosAsignados'
        ));
    }


    public function mostrarFormIns()
    {
        return $this->mostrarFormEd();
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'capacidad' => ['required', 'integer'],
            'lugar' => ['required', 'string'],
            'users' => ['nullable', 'array'],
            'usuarios' => ['nullable', 'array'],
        ]);

        $vivienda = new Vivienda();
        $vivienda->nombre = $request->nombre;
        $vivienda->capacidad = $request->capacidad;
        $vivienda->lugar = $request->lugar;
        $vivienda->save();

        // Guardamos Users en PIVOT
        $vivienda->users()->sync($request->users ?? []);

        // Asignamos pacientes a la vivienda en la FK
        Usuario::whereIn('id', $request->usuarios ?? [])->update([
            'id_vivienda' => $vivienda->id
        ]);

        return redirect('/admin/viviendas');
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'capacidad' => ['required', 'integer'],
            'lugar' => ['required', 'string'],
            'users' => ['nullable', 'array'],
            'usuarios' => ['nullable', 'array'],
        ]);

        $vivienda = Vivienda::findOrFail($id);

        $vivienda->capacidad = $request->capacidad;
        $vivienda->lugar = $request->lugar;
        $vivienda->save();

        // 1. actualizar pivot de Users
        $vivienda->users()->sync($request->users ?? []);

        // 2. quitar pacientes antiguos (solo vivienda, no borrar modelos)
        Usuario::where('id_vivienda', $vivienda->id)->update(['id_vivienda' => null]);

        // 3. reasignar pacientes marcados en form
        Usuario::whereIn('id', $request->usuarios ?? [])->update(['id_vivienda' => $vivienda->id]);

        return redirect('/admin/viviendas');
    }

    public function eliminar($id)
    {
        $vivienda = Vivienda::findOrFail($id);

        $vivienda->users()->detach(); // pivot Users
        Usuario::where('id_vivienda', $vivienda->id)->update(['id_vivienda' => null]); // FK pacientes

        $vivienda->delete();

        return redirect('/admin/viviendas');
    }
}
