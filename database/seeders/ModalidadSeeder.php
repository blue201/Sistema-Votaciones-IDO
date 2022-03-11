<?php

namespace Database\Seeders;
use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modalidads = [
            'Ciclo Común de Cultura General', 
            'Tercer Ciclo Básico Técnico',
            'Bachillerato en Ciencias y Humanidades (BCH)',
            'BTP Administración de ', 
            'BTP Contaduría y Finanzas', 
            'BTP en Administración Hotelera', 
            'BTP en Banca y Finanzas', 
            'BTP en Informática', 
            'BTP en Informática con Orientación en Robótica', 
        ];

        foreach ($modalidads as $modalidad) {
            Modalidad::create([
                'descripcion' => $modalidad
            ]);
        }
    }
}
