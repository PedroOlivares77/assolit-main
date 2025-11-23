<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_medicamento extends Model
{
    protected $table = 'usuarios_medicamentos';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento');
    }
}
