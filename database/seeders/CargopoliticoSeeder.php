<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CargoPolitico;

class CargopoliticoSeeder extends Seeder
{
    
    public function run()
    {
        $cargo_politicos = [
            'Precidente',
            'VicePrecidente',
            'Secretario',
            'Tesorero',
            'Fiscal 1',
            'Vocal',
            'Fiscal 2',
        ];
        
        foreach ($cargo_politicos as $CargoPolitico) {
            CargoPolitico::create([
                'nombre' => $CargoPolitico
            ]);
        }
    }
}
