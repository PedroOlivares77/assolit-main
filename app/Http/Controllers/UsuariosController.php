<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Usuario;
use App\Models\Vivienda;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function mostrar()
    {
        $usuarios = Usuario::all();

        return view('usuarios', ['usuarios' => $usuarios]);
    }

    public function mostrarFormIns()
    {
        $viviendas = Vivienda::all();
        $medicamentos = Medicamento::all();
        return view('formularioUsuario', [
            'viviendas' => $viviendas,
            'medicamentos' => $medicamentos
        ]);
    }

    public function insertar(Request $request)
    {
        //para validar los datos que llegan del formulario
        $request->validate([
            'id_vivienda' => ['required', 'integer'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'fecha_nacimiento' => ['required', 'date'],
            'patologia' => ['required', 'string'],
            'medicamentos' => ['nullable', 'array'],
            'med_turnos' => ['nullable', 'array']
        ]);

        $usuario = new Usuario();
        $usuario->id_vivienda = $request->id_vivienda;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->patologia = $request->patologia;
        $usuario->save();

        $syncData = [];
        if ($request->has('medicamentos')) {
            foreach ($request->medicamentos as $medId) {
                if (empty($medId)) continue;
                $turnos = $request->med_turnos[$medId] ?? [];
                $syncData[$medId] = [
                    'desayuno' => $turnos['desayuno'] ?? 0,
                    'comida'  => $turnos['comida'] ?? 0,
                    'cena'  => $turnos['cena'] ?? 0,
                ];
            }
        }
        $usuario->medicamentos()->sync($syncData);

        return redirect('/admin/usuarios');
    }

    public function mostrarFormEd($id)
    {
        $usuario = Usuario::with('medicamentos')->findOrFail($id);
        $viviendas = Vivienda::all();
        $medicamentos = Medicamento::all();

        return view('formularioUsuario', [
            'usuario' => $usuario,
            'viviendas' => $viviendas,
            'medicamentos' => $medicamentos
        ]);
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'id_vivienda' => ['required', 'integer'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'fecha_nacimiento' => ['required', 'date'],
            'patologia' => ['required', 'string'],
            'medicamentos' => ['nullable', 'array'],
            'med_turnos' => ['nullable', 'array']
        ]);

        $usuario = Usuario::where('id', $id)->first();
        $usuario->id_vivienda = $request->id_vivienda;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->patologia = $request->patologia;
        $usuario->save();

        $syncData = [];
        if ($request->has('medicamentos')) {
            foreach ($request->medicamentos as $medId) {
                if (empty($medId)) continue;
                $turnos = $request->med_turnos[$medId] ?? [];
                $syncData[$medId] = [
                    'desayuno' => $turnos['desayuno'] ?? 0,
                    'comida'  => $turnos['comida'] ?? 0,
                    'cena'  => $turnos['cena'] ?? 0,
                ];
            }
        }
        $usuario->medicamentos()->sync($syncData);

        return redirect('/admin/usuarios');
    }

    public function eliminar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->medicamentos()->detach();
        $usuario->delete();

        return redirect('/admin/usuarios');
    }
}
