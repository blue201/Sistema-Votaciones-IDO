<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class EstudianteController extends Controller
{
    public function welcome(){
        abort_if(Gate::denies('welcome'), redirect()->route('elecciones'));
        return view('welcome');
    }

    public function elecciones(){
        abort_if(Gate::denies('elecciones'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('elecciones');
    }

    public function index(){
        abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = User::join('model_has_roles', 'model_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_id')
        ->where('roles.name', 'Estudiante')
        ->select('users.id', 'users.name', 'identidad', 'users.user', 'users.created_at')
        ->get();
        return view('estudiantes/index')->with('estudiantes',$estudiante);
    }

    public function show($id){
        abort_if(Gate::denies('estudiante.show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = User::findOrFail($id);
        return view('elecciones')->with('estudiantes',$estudiante);
    }


}
