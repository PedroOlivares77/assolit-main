<?php

namespace App\Http\Controllers;

use App\Models\Post_empleo;
use Illuminate\Http\Request;

class NavegacionController extends Controller
{
    public function viviendas()
    {
        return view("viviendasTuteladas");
    }

    public function comoTrabajamos()
    {
        return view("comoTrabajamos");
    }

    public function empleo()
    {
        $posts = Post_empleo::all();
        return view("empleo", ['posts' => $posts]);
    }

    public function voluntariado()
    {
        return view("voluntariado");
    }

    public function conocenos()
    {
        return view("conocenos");
    }

    public function noPermitido()
    {
        return view('noPermitido');
    }
}
