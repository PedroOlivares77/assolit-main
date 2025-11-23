<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function hasRole($role)
    {
        //dd($this->rol);
        return $this->rol && $this->rol->tipo === $role;
    }

    public function viviendas()
    {
        return $this->belongsToMany(Vivienda::class, 'viviendas_users', 'id_vivienda', 'id_user', 'id', 'id');
    }

    public function vivienda()
    {
        return $this->belongsTo(Vivienda::class, 'id_vivienda');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
