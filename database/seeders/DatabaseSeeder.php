<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(JornadaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(UserSeeder::class);
    }
}
