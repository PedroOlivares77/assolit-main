<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function mostrar()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function mostrarFormIns()
    {
        $roles = Rol::all();
        return view('formularioUser', ['roles' => $roles]);
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'id_rol' => ['required', 'integer'],
            'nombre' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'apellidos' => ['required', 'string']

        ]);

        $user = new User();
        $user->id_rol = $request->id_rol;
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->apellidos = $request->apellidos;
        $user->save();

        return redirect('/admin/users');
    }

    public function mostrarFormEd($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Rol::all();

        return view('formularioUser', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'id_rol' => ['required', 'integer'],
            'nombre' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'apellidos' => ['required', 'string']
        ]);

        $user = User::where('id', $id)->first();
        $user->id_rol = $request->id_rol;
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->apellidos = $request->apellidos;
        $user->save();

        return redirect('/admin/users');
    }

    public function eliminar($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect('/admin/users');
    }

    public function mostrarMiAreaCliente()
    {
        return view("miAreaCliente");
    }

    public function mostrarPsiquiatra()
    {
        return view("miAreaPsiquiatra");
    }

    public function mostrarSocial()
    {
        return view("miAreaTrabajadorSocial");
    }
}
