<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    public function mostrar()
    {
        $medicamentos = Medicamento::all();

        return view('medicamentos', ['medicamentos' => $medicamentos]);
    }

    public function mostrarFormIns()
    {
        $medicamentos = Medicamento::all();
        return view('formularioMedicamento', ['medicamentos' => $medicamentos]);
    }

    public function insertar(Request $request)
    {
        //para validar los datos que llegan del formulario
        $request->validate([
            'nombre' => ['required', 'string'],
            'dosis' => ['required', 'int'],
        ]);

        $medicamento = new Medicamento();
        $medicamento->nombre = $request->nombre;
        $medicamento->dosis = $request->dosis;
        $medicamento->save();

        return redirect('/admin/medicamentos');
    }

    public function mostrarFormEd($id)
    {
        $medicamento = Medicamento::where('id', $id)->first();

        return view('formularioMedicamento', [
            'medicamento' => $medicamento
        ]);
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'dosis' => ['required', 'int'],
        ]);

        $medicamento = Medicamento::findOrFail($id);

        $medicamento->nombre = $request->nombre;
        $medicamento->dosis = $request->dosis;
        $medicamento->save();

        return redirect('/admin/medicamentos');
    }

    public function eliminar($id)
    {
        $medicamento = Medicamento::where('id', $id)->first();
        $medicamento->delete();

        return redirect('/admin/medicamentos');
    }
}
