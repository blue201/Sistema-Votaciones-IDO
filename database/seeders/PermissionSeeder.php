<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'elecciones',
            'welcome',
            'estudiante.index',
            'estudiante.show',
            'planilla.edit',
            'planilla.update',
            'planilla.create',
            'planilla.index',
            'candidato.index',
            'candidato.edit',
            'candidato.create',
            'candidato.destroy',
            'profesor.index',
            'profesor.show',
            'profesor.create',
            'profesor.edit',
            'planillaa.index',
            'planillaa.create',
            'planilla.mostrar',
            'administrador.index',
            

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
