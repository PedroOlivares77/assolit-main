<?php

namespace Database\Seeders;

use App\Models\Vivienda_user;
use Illuminate\Database\Seeder;

class Viviendas_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vivienda_user::create([
            'id_vivienda' => 1,
            'id_user' => 2
        ]);

        Vivienda_user::create([
            'id_vivienda' => 1,
            'id_user' => 4
        ]);

        Vivienda_user::create([
            'id_vivienda' => 1,
            'id_user' => 5
        ]);

        Vivienda_user::create([
            'id_vivienda' => 2,
            'id_user' => 2
        ]);

        Vivienda_user::create([
            'id_vivienda' => 2,
            'id_user' => 6
        ]);

        Vivienda_user::create([
            'id_vivienda' => 2,
            'id_user' => 7
        ]);

        Vivienda_user::create([
            'id_vivienda' => 3,
            'id_user' => 3
        ]);

        Vivienda_user::create([
            'id_vivienda' => 3,
            'id_user' => 8
        ]);

        Vivienda_user::create([
            'id_vivienda' => 3,
            'id_user' => 9
        ]);

        Vivienda_user::create([
            'id_vivienda' => 4,
            'id_user' => 3
        ]);

        Vivienda_user::create([
            'id_vivienda' => 4,
            'id_user' => 10
        ]);

        Vivienda_user::create([
            'id_vivienda' => 5,
            'id_user' => 3
        ]);

        Vivienda_user::create([
            'id_vivienda' => 5,
            'id_user' => 11
        ]);

    }
}
