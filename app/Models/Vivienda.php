<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    protected $table = 'viviendas';

    public function usuarios() // FK 1 a muchos
    {
        return $this->hasMany(Usuario::class, 'id_vivienda');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'viviendas_users', 'id_vivienda', 'id_user', 'id', 'id')
        ->withTimestamps();
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class, 'id_vivienda');
    }

    public function postsEmpleos()
    {
        return $this->hasMany(Post_empleo::class, 'id_vivienda');
    }
}
