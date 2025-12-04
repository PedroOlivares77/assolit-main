<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
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

public function mostrarPsiquiatra(Request $request)
{
    // Todas las viviendas donde el psiquiatra tiene acceso
    $viviendasPsiquiatra = Auth::user()->viviendas()->get();

    // Vivienda seleccionada (por default la primera)
    $selectedViviendaId = $request->get('vivienda_id', $viviendasPsiquiatra->first()->id ?? null);

    // Traemos usuarios solo de la vivienda seleccionada
    $usuarios = Usuario::where('id_vivienda', $selectedViviendaId)
        ->with('medicamentos', 'vivienda')
        ->get();

    // Todos los medicamentos para el select
    $medicamentos = Medicamento::all();

    return view('miAreaPsiquiatra', compact(
        'viviendasPsiquiatra',
        'selectedViviendaId',
        'usuarios',
        'medicamentos'
    ));
}

    public function actualizarPaciente(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Validar que el usuario pertenece a una vivienda del psiquiatra
        $viviendasIds = Auth::user()->viviendas->pluck('id')->toArray();
        if (!in_array($usuario->id_vivienda, $viviendasIds)) {
            abort(403);
        }

        // Actualizar patología
        $usuario->patologia = $request->input('patologia');
        $usuario->save();

        // Procesar medicamentos
        $medicamentosInput = $request->input('medicamentos', []);

        // Construir array de sync
        $syncData = [];
        foreach ($medicamentosInput as $medId => $medData) {
            $syncData[$medId] = [
                'desayuno' => isset($medData['desayuno']) ? 1 : 0,
                'comida'   => isset($medData['comida']) ? 1 : 0,
                'cena'     => isset($medData['cena']) ? 1 : 0,
            ];
        }

        // Sincronizar: elimina los medicamentos no marcados
        $usuario->medicamentos()->sync($syncData);

        return redirect()->route('miAreaPsiquiatra')->with('ok', 'Paciente actualizado ✅');
    }
}
