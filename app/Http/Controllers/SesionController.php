<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SesionController extends Controller
{
    public function mostrar()
    {
        return view('login');
    }

public function iniciarSesion(Request $request){
        $credenciales = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        
        if(Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->rol->tipo == 'admin'){
                return redirect('/admin');
            }elseif($user->rol->tipo == 'psiquiatra'){
                return redirect('/trabajador-psiquiatra');
            }elseif($user->rol->tipo == 'trabajador_social'){
                return redirect('/trabajador-social');
            }else{
                return redirect('/area-cliente');
            }
        } else {
            $errormsg = "El email o la contraseña no son correctos.";
            return view('login', [
            'errormsg' => $errormsg
            ]);
            
        }
    }

    public function mostrarRegistro()
    {
        return view('formularioRegistro');
    }

    public function registro(Request $request){
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'rePassword' => ['required', 'string'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
        ]);

        if($request->password == $request->rePassword){
            $usuario = new User();
            $usuario->id_rol = 4;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;

            if(User::where('email', $request->email)->first() != null) {
                return redirect('/registro');
            }

            $usuario->save();
            Auth::login($usuario);
            //cambiar para que redirija a mi-cuenta
            return redirect('/');

        }else{
            //la contraseña no coincide
            return redirect('/registro');
        }
        
    }


    public function cerrarSesion() {
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
