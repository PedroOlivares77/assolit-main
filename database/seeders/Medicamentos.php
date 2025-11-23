<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Seeder;

class Medicamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicamento::create([
            'nombre' => 'Escitalopram',
            'dosis' => 10,
        ]);

        Medicamento::create([
            'nombre' => 'Quetiapina',
            'dosis' => 150,
        ]);

        Medicamento::create([
            'nombre' => 'Zyprexa',
            'dosis' => 5
        ]);

        Medicamento::create([
            'nombre' => 'Noctamid',
            'dosis' => 2
        ]);

        Medicamento::create([
            'nombre' => 'Antabus',
            'dosis' => 250
        ]);

        Medicamento::create([
            'nombre' => 'Diazepam',
            'dosis' => 5
        ]);

        Medicamento::create([
            'nombre' => 'Risperdal',
            'dosis' => 3
        ]);

        Medicamento::create([
            'nombre' => 'Sertralina',
            'dosis' => 50
        ]);

        Medicamento::create([
            'nombre' => 'Lorazepam',
            'dosis' => 1
        ]);
    }
}
