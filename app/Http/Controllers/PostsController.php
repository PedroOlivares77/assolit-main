<?php

namespace App\Http\Controllers;

use App\Models\Post_empleo;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function mostrar()
    {
        $posts = Post_empleo::all();
        return view('postsEmpleos', ['posts' => $posts]);
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'id_vivienda' => ['required', 'integer'],
            'titulo' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]);

        $post = new Post_empleo();
        $post->id_vivienda = $request->id_vivienda;
        $post->titulo = $request->titulo;
        $post->body = $request->body;
        $post->save();

        return redirect('/admin/posts');
    }

    public function editar($id, Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]);

        $post = Post_empleo::findOrFail($id);
        $post->titulo = $request->titulo;
        $post->body = $request->body;
        $post->save();

        return redirect('/admin/posts');
    }

    public function eliminar($id)
    {
        $post = Post_empleo::findOrFail($id);
        $post->delete();

        return redirect('/admin/posts');
    }
}
