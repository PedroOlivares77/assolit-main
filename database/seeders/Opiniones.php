<?php

namespace Database\Seeders;

use App\Models\Opinion;
use Illuminate\Database\Seeder;

class Opiniones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opinion::create([
            'id_vivienda' => 1,
            'comentario' => 'Muy buena experiencia en el Hogar Olivo, el personal es muy amable y mi hermano esta encantado.',
            'valoracion' => 5,
            'autor' => 'Hermano de usuario'
        ]);

        Opinion::create([
            'id_vivienda' => 4,
            'comentario' => 'De vez en cuando voy a ver a mi hijo al Hogar Cerezo, le encanta estar con los trabajadores sociales.',
            'valoracion' => 5,
            'autor' => 'Madre de usuario'
        ]);

        Opinion::create([
            'id_vivienda' => 2,
            'comentario' => 'El Hogar Encina es un lugar estupendo, mi hermana se siente como en casa y recibe una atención excelente.',
            'valoracion' => 4,
            'autor' => 'Hermana de usuario'
        ]);
    }
}
