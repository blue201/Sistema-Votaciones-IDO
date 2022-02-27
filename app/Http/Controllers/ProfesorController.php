<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProfesorController extends Controller
{
    public function index(){
        abort_if(Gate::denies('profesor.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $profesors = User::join('model_has_roles', 'model_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_id')
        ->where('roles.name', 'Colaborador')
        ->orwhere('roles.name', 'Encargado')
        ->select('users.id', 'users.name', 'identidad', 'users.user', 'users.created_at')
        ->get();
        return view('profesor/index')->with('profesors',$profesors);
    }

    public function create(){
        abort_if(Gate::denies('profesor.create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $roles = DB::table('roles')->get();
        return view('profesor/create')->with('roles',$roles);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:40',
            'user' => 'required|string|max:20|unique:users',
            'identidad' => 'required|string|numeric|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|exists:roles,name',
        ]);

        User::create([
            'name' => $request->input('name'),
            'user' => $request->input('user'),
            'identidad' => $request->input('identidad'),
            'password' => bcrypt($request->input('password')),
        ])->assignRole($request->input('rol'));

        return redirect()->route('profesor.index')->with('mensaje','el profesor fue creado exitosamente');
    }

    public function show($id){
        abort_if(Gate::denies('profesor.show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $profesor = User::findOrFail($id);
        return view('profesor/show')->with('profesors',$profesor);
    }
}
