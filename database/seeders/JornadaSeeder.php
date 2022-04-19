<?php

namespace Database\Seeders;
use App\Models\Jornada;
use Illuminate\Database\Seeder;

class JornadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jornadas = [
            'Extendida',
            'Matutina',
            'Nocturna',
            'SEMED',
            'Vespertina'
        ];

        foreach ($jornadas as $jornada) {
            Jornada::create([
                'descripcion' => $jornada
            ]);
        }
    }
}
