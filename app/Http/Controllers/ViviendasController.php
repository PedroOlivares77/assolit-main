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

        // Users: solo psiquiatra y trabajador social
        $users = User::whereIn('id_rol', [2, 3])->get();

        // Usuarios: los que no tienen vivienda asignada
        $usuariosDisponibles = Usuario::whereNull('id_vivienda')->get();

        // Si hay vivienda (editar), los asignados
        $usersAsignados = $vivienda ? $vivienda->users : collect();
        $usuariosAsignados = $vivienda ? $vivienda->usuarios : collect();

        // Users disponibles: filtrar según reglas
        $usersDisponibles = $users->filter(function ($user) use ($vivienda) {
            if ($user->rol_id == 2) return true; // psiquiatra
            if ($user->rol_id == 3) return !$user->vivienda_id || ($vivienda && $user->vivienda_id == $vivienda->id);
            return false;
        });

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

        if ($request->has('users')) {
            $vivienda->users()->sync($request->users);
        }

        if ($request->has('usuarios')) {
            $vivienda->usuarios()->sync($request->usuarios);
        }

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
        $vivienda->nombre = $request->nombre;
        $vivienda->capacidad = $request->capacidad;
        $vivienda->lugar = $request->lugar;
        $vivienda->save();

        $vivienda->users()->sync($request->users ?? []);
        $vivienda->usuarios()->sync($request->usuarios ?? []);


        return redirect('/admin/viviendas');
    }

    public function eliminar($id)
    {
        $vivienda = Vivienda::findOrFail($id);
        $vivienda->users()->detach();
        $vivienda->usuarios()->detach();
        $vivienda->delete();

        return redirect('/admin/viviendas');
    }
}
