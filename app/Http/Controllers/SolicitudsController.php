<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudsController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string',
            'email'   => 'required|email',
            'telefono' => 'nullable|string',
            'mensaje' => 'required|string',
        ]);

        Solicitud::create([
            'user_id' => Auth::id(),
            'nombre'  => $request->nombre,
            'email'   => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'estado'  => 'Nuevo',
        ]);

        return back()->with('ok', 'Solicitud enviada ✅');
    }

    public function seguimientoUsuario()
    {
        $solicitudes = Solicitud::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return view('miAreaCliente', ['solicitudes' => $solicitudes]);
    }

    public function listarAdmin()
    {
        $solicitudes = Solicitud::with('user')->orderByDesc('created_at')->get();
        return view('solicitudes', ['solicitudes' => $solicitudes]);
    }

    public function cambiarEstado($id)
    {
        $solcitud = Solicitud::findOrFail($id);
        $solcitud->estado = 'Leída';
        $solcitud->save();
        return back();
    }

    public function eliminar($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return back()->with('ok', 'Solicitud eliminada ✅');
    }
}
