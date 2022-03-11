<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Curso;
use App\Models\Grupo;
use App\Models\Jornada;
use App\Models\Modalidad;
use App\Models\Estudiante;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'user' => ['required', 'string', 'max:20', 'unique:users'],
            'identidad' => ['required', 'string', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'modalidad' => ['required', 'exists:modalidads,id'],
            'cursos' => ['required',  'exists:cursos,id'],
            'grupos' => ['required',  'exists:grupos,id'],
            'jornadas' => ['required',  'exists:jornadas,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $usuario = User::create([
            'name' => $data['name'],
            'user' => $data['user'],
            'identidad' => $data['identidad'],
            'password' => Hash::make($data['password']),
        ])->assignRole('Estudiante');

        Estudiante::create([
            'id_modalidad' => $data['modalidad'],
            'id_cursos' => $data['cursos'],
            'id_grupos' => $data['grupos'],
            'id_jornadas' => $data['jornadas'],
            'id_user' => $usuario->id,
        ]);

        return $usuario;
    }

    public function showRegistrationForm()
    {
        $cursos=Curso::all();
        $modalidads=Modalidad::all();
        $grupos=Grupo::all();
        $jornadas=Jornada::all();
        return view('auth.register', compact('cursos','modalidads','grupos','jornadas'));
    }

}
