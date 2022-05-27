<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CargoPolitico;

class CargopoliticoSeeder extends Seeder
{
    
    public function run()
    {
        $cargo_politicos = [
            'Presidente',
            'VicePrecidente',
            'Secretario',
            'Tesorero',
            'Fiscal 1',
            'Fiscal 2',
            'Vocal 1',
            'Vocal 2',
        ];
        
        foreach ($cargo_politicos as $CargoPolitico) {
            CargoPolitico::create([
                'nombre' => $CargoPolitico
            ]);
        }
    }
}
