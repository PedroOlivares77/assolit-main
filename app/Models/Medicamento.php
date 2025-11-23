<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuarios_medicamentos', 'id_medicamento', 'id_usuarios', 'id', 'id');
    }
}
