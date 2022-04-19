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
            'Tercer Ciclo de Educación Básica', 
            'BTP - Informática con Orientación en Robótica',
            'BTP - Informática',
            'BTP - Contaduria y Finanzas', 
            'Bachillerato en Ciencias y Humanidades', 
            'BTP - Administración de Empresas', 
            'BTP - Banca y Finanzas', 
            'BTP - Administración Hotelera', 
            'T.E.C.B.T', 
        ];

        foreach ($modalidads as $modalidad) {
            Modalidad::create([
                'descripcion' => $modalidad
            ]);
        }
    }
}
