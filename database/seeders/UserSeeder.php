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

        User::create([
            'name' => 'estudiante1',
            'user' => 'estudiante1',
            'identidad' => '1111111111111',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante2',
            'user' => 'estudiante2',
            'identidad' => '2222222222222',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante3',
            'user' => 'estudiante3',
            'identidad' => '3333333333333',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante4',
            'user' => 'estudiante4',
            'identidad' => '4444444444444',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante5',
            'user' => 'estudiante5',
            'identidad' => '5555555555555',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante6',
            'user' => 'estudiante6',
            'identidad' => '6666666666666',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante7',
            'user' => 'estudiante7',
            'identidad' => '7777777777777',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante8',
            'user' => 'estudiante8',
            'identidad' => '8888888888888',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante9',
            'user' => 'estudiante9',
            'identidad' => '9999999999999',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante10',
            'user' => 'estudiante10',
            'identidad' => '1234567890123',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');
        User::create([
            'name' => 'estudiante11',
            'user' => 'estudiante11',
            'identidad' => '1111111111119',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante12',
            'user' => 'estudiante12',
            'identidad' => '2222222222229',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante13',
            'user' => 'estudiante13',
            'identidad' => '3333333333339',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante14',
            'user' => 'estudiante14',
            'identidad' => '4444444444449',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante15',
            'user' => 'estudiante15',
            'identidad' => '5555555555559',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante16',
            'user' => 'estudiante16',
            'identidad' => '6666666666669',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante17',
            'user' => 'estudiante17',
            'identidad' => '7777777777779',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante18',
            'user' => 'estudiante18',
            'identidad' => '8888888888889',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante19',
            'user' => 'estudiante19',
            'identidad' => '9999999999990',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

        User::create([
            'name' => 'estudiante20',
            'user' => 'estudiante20',
            'identidad' => '1234567890124',
            'password' => bcrypt('12345678')
        ])->assignRole('Estudiante');

    }
}
