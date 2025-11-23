<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    public function vivienda()
    {
        return $this->belongsTo(Vivienda::class, 'id_vivienda');
    }

    public function medicaciones()
    {
        return $this->belongsToMany(Medicamento::class, 'usuarios_medicamentos', 'id_usuarios', 'id_medicamento', 'id', 'id');
    }
    
}
