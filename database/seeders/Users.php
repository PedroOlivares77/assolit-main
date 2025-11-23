<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id_rol' => 1,
            'nombre' => 'Pedro',
            'apellidos' => 'Olivares Amer',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123'),
        ]);

        User::create([
            'id_rol' => 2,
            'nombre' => 'Roberto',
            'apellidos' => 'Rodriguez Espinosa',
            'email' => 'roberto@gmail.com',
            'password' => Hash::make('Roberto123'),
        ]);

        User::create([
            'id_rol' => 2,
            'nombre' => 'Alicia',
            'apellidos' => 'Perez Gomez',
            'email' => 'alicia@gmail.com',
            'password' => Hash::make('Alicia123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Felipe',
            'apellidos' => 'Caballero Martinez',
            'email' => 'felipe@gmail.com',
            'password' => Hash::make('Felipe123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Martina',
            'apellidos' => 'Hernandez Andreu',
            'email' => 'martina@gmail.com',
            'password' => Hash::make('Martina123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Nerea',
            'apellidos' => 'Bover Patrick',
            'email' => 'nerea@gmail.com',
            'password' => Hash::make('Nerea123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Paco',
            'apellidos' => 'Samaniego Montes',
            'email' => 'paco@gmail.com',
            'password' => Hash::make('Paco123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Jose',
            'apellidos' => 'Lagos Gutierrez',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('Jose123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Karina',
            'apellidos' => 'Malas Fernandez',
            'email' => 'karina@gmail.com',
            'password' => Hash::make('Karina123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Diego',
            'apellidos' => 'Torres Ramos',
            'email' => 'diego@gmail.com',
            'password' => Hash::make('Diego123'),
        ]);

        User::create([
            'id_rol' => 3,
            'nombre' => 'Paula',
            'apellidos' => 'Ramirez Soto',
            'email' => 'paula@gmail.com',
            'password' => Hash::make('Paula123'),
        ]);
    }
}
