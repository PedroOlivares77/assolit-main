<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vivienda_user extends Model
{
    protected $table = 'viviendas_users';

    public function vivienda()
    {
        return $this->belongsTo(Vivienda::class, 'id_vivienda');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
