<?php

namespace Database\Seeders;
use App\Models\Grupo;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<11 ; $i++) { 
            Grupo::create([
                'descripcion' => $i,
            ]);
        }
    }
}
