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

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'usuarios_medicamentos', 'id_usuario', 'id_medicamento', 'id', 'id')
        ->withPivot('desayuno', 'comida', 'cena')
        ->withTimestamps();
    }
}
