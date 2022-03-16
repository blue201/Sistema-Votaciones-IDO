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
            
            'planilla.index',
            'candidato.index',
            'candidato.create',
            'planilla.create',

            'profesor.index',
            'profesor.show',
            'profesor.create',
            'profesor.edit',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
