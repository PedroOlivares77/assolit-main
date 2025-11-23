<?php

namespace Database\Seeders;

use App\Models\Vivienda;
use Illuminate\Database\Seeder;

class Viviendas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vivienda::create([
            'nombre' => 'Hogar Olivo',
            'capacidad' => 7,
            'lugar' => 'Sagunto'
        ]);

        Vivienda::create([
            'nombre' => 'Hogar Encina',
            'capacidad' => 5,
            'lugar' => 'Segorbe'
        ]);

        Vivienda::create([
            'nombre' => 'Hogar Sauce',
            'capacidad' => 6,
            'lugar' => 'Castellon'
        ]);

        Vivienda::create([
            'nombre' => 'Hogar Cerezo',
            'capacidad' => 5,
            'lugar' => 'Moncada'
        ]);

        Vivienda::create([
            'nombre' => 'Hogar Almendro',
            'capacidad' => 5,
            'lugar' => 'Puzol'
        ]);
    }
}
