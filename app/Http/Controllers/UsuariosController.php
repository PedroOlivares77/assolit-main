<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function mostrarMiAreaCliente(){
        return view("miAreaCliente");
    }

    public function mostrarAdmin(){
        return view("indexAdmin");
    }

    public function mostrarPsiquiatra(){
        return view("miAreaPsiquiatra");
    }

    public function mostrarSocial(){
        return view("miAreaTrabajadorSocial");
    }
}
