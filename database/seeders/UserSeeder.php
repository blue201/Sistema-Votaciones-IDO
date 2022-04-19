<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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

        $sql = 'SELECT registro__alumnos.Nombres, " ", registro__alumnos.Apellidos,
        registro__alumnos.RNE_Alumno AS identidad,
        registro__alumnos.RNE_Alumno AS password,
        jornada, grado, Nombre_Modalidad
        FROM idos.registro__alumnos registro__alumnos
        JOIN idos.matriculas matriculas ON matriculas.RNE_Alumno = registro__alumnos.RNE_Alumno
        JOIN idos.grupos grupos ON grupos.Id_Grupo = matriculas.Id_Grupo
        JOIN idos.modalidades modalidades ON modalidades.id = grupos.Id_Modalidad;';

        $estudiantes = DB::select($sql);

        foreach ($estudiantes as $estudiante) {
            $user = User::create([
                'name' => $estudiante->Nombres." ".$estudiante->Apellidos,
                'user' => $estudiante->Nombres." ".$estudiante->Apellidos,
                'identidad' => $estudiante->identidad,
                'password' => bcrypt($estudiante->password),
            ])->assignRole('Estudiante');

            $modalidad = DB::table('modalidads')->where('descripcion',$estudiante->Nombre_Modalidad)->first();
            $curso = DB::table('cursos')->where('descripcion',$estudiante->grado)->first();
            $jornada = DB::table('jornadas')->where('descripcion',$estudiante->jornada)->first();

            Estudiante::create([
                'id_user' => $user->id,
                'id_modalidad' => $modalidad->id,
                'id_cursos' => $curso->id,
                'id_jornadas' => $jornada->id,
            ]);
        }
        


    }
}
