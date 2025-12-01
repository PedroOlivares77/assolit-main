<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavegacionController extends Controller
{  
    public function viviendas(){
        return view("viviendasTuteladas");
    }

    public function comoTrabajamos(){
        return view("comoTrabajamos");
    }

    public function empleoVoluntariado(){
        return view("empleoVoluntariado");
    }

    public function conocenos(){
        return view("conocenos");
    }

    public function noPermitido(){
        return view('noPermitido');
    }
}
