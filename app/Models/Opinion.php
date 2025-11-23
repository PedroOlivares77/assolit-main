<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = 'opiniones';

    public function vivienda()
    {
        return $this->belongsTo(Vivienda::class, 'id_vivienda');
    }
}
