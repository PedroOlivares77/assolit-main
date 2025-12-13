<?php

namespace Database\Seeders;

use App\Models\Post_empleo;
use Illuminate\Database\Seeder;

class Posts_empleos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post_empleo::create([
            'id_vivienda' => 5,
            'titulo' => 'Oferta de empleo: Integrador/a social 40h',
            'body' => 'Se necesita un trabajador social con experiencia en el sector para unirse a nuestro equipo en el Hogar Almendro. El candidato ideal debe tener habilidades de comunicación excepcionales y una pasión por ayudar a los demás.'
        ]);
        
        Post_empleo::create([
            'id_vivienda' => 4,
            'titulo' => 'Oferta de empleo: Educador/a social 40h',
            'body' => 'El Hogar Cerezo está buscando un educador social dedicado para trabajar con nuestros residentes. El candidato seleccionado será responsable de desarrollar e implementar programas educativos y de apoyo.'
        ]);

        Post_empleo::create([
            'id_vivienda' => 1,
            'titulo' => 'Oferta de empleo: Integrador/a social 40h',
            'body' => 'El Hogar Olivo busca un integrador social con experiencia para unirse a nuestro equipo. El candidato ideal debe tener habilidades de comunicación excepcionales y una pasión por ayudar a los demás.'
        ]);
    }
}
