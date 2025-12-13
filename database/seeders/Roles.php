<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create(['tipo' => 'admin']);
        Rol::create(['tipo' => 'psiquiatra']);
        Rol::create(['tipo' => 'trabajador_social']);
        Rol::create(['tipo' => 'user_normal']);
    }
}
