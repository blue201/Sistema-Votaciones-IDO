<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'user' => 'Admin',
            'identidad' => '0000000000000',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

    }
}
