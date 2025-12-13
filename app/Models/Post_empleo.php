<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_empleo extends Model
{
    protected $table = 'posts_empleos';

    public function vivienda()
    {
        return $this->belongsTo(Vivienda::class, 'id_vivienda');
    }
}
