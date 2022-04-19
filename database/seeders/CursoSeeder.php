<?php

namespace Database\Seeders;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = [
            'Séptimo Grado',
            'Octavo Grado',
            'Noveno Grado',
            'Undécimo Grado',
            'Décimo Grado',
            'Duodécimo Grado',
        ];

        foreach ($cursos as $curso) {
            Curso::create([
                'descripcion' => $curso
            ]);
        }
    }
}
