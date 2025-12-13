<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolesController extends Controller
{
        public function mostrar(){
        $roles = Rol::all();

        return view('roles', ['roles'=> $roles]);
    }

    public function listar(){
        $roles = Rol::all();

        return response()->json([
            'status' => 200,
            'roles' => $roles
        ]);
    }

    public function buscar($id){
        $rol = Rol::where('id', $id)->first();

        return view('roles', ['rol'=> $rol]);
    }

    public function insertar(Request $request){
        
        $request->validate([
            'tipo' => ['required', 'string']
        ]);
        
        $rol = new Rol();
        $rol->tipo = $request->tipo;
        $rol->save();

        return response()->json([
            'status' => 200,
            'mensaje' => 'Rol creado correctamente'
        ]);

    }

    public function mostrarEditar($id){
        $rol = Rol::where('id', $id)->first();

        return view('formularioRolesEditar', [
            'rol' => $rol
        ]);
    }
    
    public function editar(Request $request, $id){
        $request->validate([
            'tipo' => ['required', 'string']
        ]);

        $rol = Rol::where('id', $id)->first();
        $rol->tipo = $request->tipo;
        $rol->save();

        return response()->json([
            'status' => 200,
            'mensaje' => 'Rol actualizado correctamente',
            'rol' => $rol
        ]);
    }

    public function eliminar($id){
        $rol = Rol::where('id', $id)->first();
        $rol->delete();

        return response()->json([
            'status' => 200,
            'mensaje' => 'Rol borrado correctamente'
        ]);
    }
}
