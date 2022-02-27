<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $admin_permissions = Permission::all();
        $estudiante_permissions = Permission::where('id', 1);
        $colaborador_permissions = Permission::whereBetween('id', [1, 6]);
        $responsable_permissions = Permission::whereBetween('id', [1, 8]);


        // estudiante
        Role::findOrFail(2)->permissions()->sync($estudiante_permissions->pluck('id'));
        // colaborador
            Role::findOrFail(3)->permissions()->sync($colaborador_permissions->pluck('id'));
        //encargado
            Role::findOrFail(4)->permissions()->sync($responsable_permissions->pluck('id'));

        // Admin
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
    }
}
