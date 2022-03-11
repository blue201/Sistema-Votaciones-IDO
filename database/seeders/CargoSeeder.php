<?php

namespace Database\Seeders;
use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            'Orientador',
            'Consejero',
            'Docente',
        ];

        foreach ($cargos as $cargo) {
            Cargo::create([
                'descripcion' => $cargo
            ]);
        }
    }
}
