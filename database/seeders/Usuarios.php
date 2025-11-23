<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'id_vivienda' => 1,
            'nombre' => 'Francisco',
            'apellidos' => 'Morales Garcia',
            'fecha_nacimiento' => '1995-07-18',
            'patologia' => 'Ezquizofrenia paranoide',
        ]);

        Usuario::create([
            'id_vivienda' => 1,
            'nombre' => 'Ana',
            'apellidos' => 'López Díaz',
            'fecha_nacimiento' => '1988-03-12',
            'patologia' => 'Trastorno bipolar',
        ]);

        Usuario::create([
            'id_vivienda' => 1,
            'nombre' => 'Marcos',
            'apellidos' => 'Pérez Rubio',
            'fecha_nacimiento' => '1975-11-05',
            'patologia' => 'Depresión mayor',
        ]);

        Usuario::create([
            'id_vivienda' => 1,
            'nombre' => 'Lucía',
            'apellidos' => 'Sánchez Romero',
            'fecha_nacimiento' => '2000-09-21',
            'patologia' => 'Trastorno de ansiedad',
        ]);

        Usuario::create([
            'id_vivienda' => 1,
            'nombre' => 'Javier',
            'apellidos' => 'Gómez Torres',
            'fecha_nacimiento' => '1992-02-28',
            'patologia' => 'Trastorno límite de la personalidad',
        ]);

        Usuario::create([
            'id_vivienda' => 2,
            'nombre' => 'Elena',
            'apellidos' => 'Martín Ruiz',
            'fecha_nacimiento' => '1985-06-10',
            'patologia' => 'Trastorno del espectro autista',
        ]);

        Usuario::create([
            'id_vivienda' => 2,
            'nombre' => 'Carlos',
            'apellidos' => 'Navarro León',
            'fecha_nacimiento' => '1979-12-03',
            'patologia' => 'Esquizofrenia paranoide',
        ]);

        Usuario::create([
            'id_vivienda' => 2,
            'nombre' => 'Sara',
            'apellidos' => 'Hernández Molina',
            'fecha_nacimiento' => '2001-04-16',
            'patologia' => 'Trastorno de Estrés Postraumático',
        ]);

        Usuario::create([
            'id_vivienda' => 2,
            'nombre' => 'Miguel',
            'apellidos' => 'Reyes Castro',
            'fecha_nacimiento' => '1968-01-25',
            'patologia' => 'Trastorno del espectro autista',
        ]);

        Usuario::create([
            'id_vivienda' => 3,
            'nombre' => 'Alba',
            'apellidos' => 'Domínguez Serrano',
            'fecha_nacimiento' => '1999-08-14',
            'patologia' => 'Trastorno obsesivo compulsivo',
        ]);

        Usuario::create([
            'id_vivienda' => 3,
            'nombre' => 'Raúl',
            'apellidos' => 'Ortega Vega',
            'fecha_nacimiento' => '1981-05-07',
            'patologia' => 'Trastorno bipolar tipo II',
        ]);

        Usuario::create([
            'id_vivienda' => 3,
            'nombre' => 'Patricia',
            'apellidos' => 'Cano Fuentes',
            'fecha_nacimiento' => '1994-10-19',
            'patologia' => 'Sindrome de Asperger',
        ]);

        Usuario::create([
            'id_vivienda' => 3,
            'nombre' => 'David',
            'apellidos' => 'Iglesias Bravo',
            'fecha_nacimiento' => '1970-03-30',
            'patologia' => 'Esquizofrenia',
        ]);

        Usuario::create([
            'id_vivienda' => 3,
            'nombre' => 'Rosa',
            'apellidos' => 'Vargas Cuesta',
            'fecha_nacimiento' => '1986-09-02',
            'patologia' => 'Trastorno límite de la personalidad',
        ]);

        Usuario::create([
            'id_vivienda' => 4,
            'nombre' => 'Hugo',
            'apellidos' => 'Santos Aguado',
            'fecha_nacimiento' => '1997-12-27',
            'patologia' => 'Transtorno Dual',
        ]);

        Usuario::create([
            'id_vivienda' => 4,
            'nombre' => 'Isabel',
            'apellidos' => 'Crespo Nieto',
            'fecha_nacimiento' => '1978-07-08',
            'patologia' => 'Sindrome de Asperger',
        ]);

        Usuario::create([
            'id_vivienda' => 4,
            'nombre' => 'Tomás',
            'apellidos' => 'Durán Pardo',
            'fecha_nacimiento' => '1991-01-03',
            'patologia' => 'Trastorno depresivo',
        ]);

        Usuario::create([
            'id_vivienda' => 4,
            'nombre' => 'Nerea',
            'apellidos' => 'Roldán Torres',
            'fecha_nacimiento' => '2003-06-25',
            'patologia' => 'Sindrome de Down',
        ]);

        Usuario::create([
            'id_vivienda' => 5,
            'nombre' => 'Adrián',
            'apellidos' => 'Calvo Carrillo',
            'fecha_nacimiento' => '1983-11-13',
            'patologia' => 'Demencia frontotemporal',
        ]);

        Usuario::create([
            'id_vivienda' => 5,
            'nombre' => 'Beatriz',
            'apellidos' => 'Gallego Lara',
            'fecha_nacimiento' => '1990-04-04',
            'patologia' => 'Esquizofrenia',
        ]);

        Usuario::create([
            'id_vivienda' => 5,
            'nombre' => 'Claudia',
            'apellidos' => 'Mendoza López',
            'fecha_nacimiento' => '1996-05-22',
            'patologia' => 'Trastorno obsesivo compulsivo',
        ]);

        Usuario::create([
            'id_vivienda' => 5,
            'nombre' => 'Jorge',
            'apellidos' => 'Ferrer Castillo',
            'fecha_nacimiento' => '1989-09-17',
            'patologia' => 'Trastorno límite de la personalidad',
        ]);
    }
}
