<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Roles::class);
        $this->call(Users::class);
        $this->call(Viviendas::class);
        $this->call(Medicamentos::class);
        $this->call(Opiniones::class);
        $this->call(Posts_empleos::class);
        $this->call(Usuarios::class);
        $this->call(Usuarios_medicamentos::class);
        $this->call(Viviendas_users::class);
    }
}
