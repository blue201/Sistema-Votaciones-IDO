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
            'Septimo',
            'Octavo',
            'Noveno',
            'Decimo',
            'Undecimo',
            'Duodecimo',
        ];

        foreach ($cursos as $curso) {
            Curso::create([
                'descripcion' => $curso
            ]);
        }
    }
}
