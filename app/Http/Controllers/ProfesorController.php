<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProfesorController extends Controller
{
    public function index(){
        abort_if(Gate::denies('profesor.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $profesors = Profesor::all();
        return view('profesor/index')->with('profesors',$profesors);
    }

    public function create(){
        abort_if(Gate::denies('profesor.create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $roles = DB::table('roles')->get();
        $cargos = Cargo::all();
        return view('profesor/create')->with('roles',$roles)->with('cargos',$cargos);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:40',
            'user' => 'required|string|max:20|unique:users',
            'identidad' => 'required|string|numeric|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cargo' => 'required|exists:cargos,id',
            'rol' => 'required|exists:roles,name',
        ]);

        $usuario = User::create([
            'name' => $request->input('name'),
            'user' => $request->input('user'),
            'identidad' => $request->input('identidad'),
            'password' => bcrypt($request->input('password')),
        ])->assignRole($request->input('rol'));

        Profesor::create([
            'id_cargos' => $request->input('cargo'),
            'id_user' => $usuario->id,
            'funcion' => $request->input('rol'),
        ]);

        return redirect()->route('profesor.index')->with('mensaje','el profesor fue creado exitosamente');
    }

    public function edit($id){
        abort_if(Gate::denies('profesor.edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $roles = DB::table('roles')->get();
        $cargos = Cargo::all();
        $profesor = Profesor::findorfail($id);
        return view('profesor/edit')->with('roles',$roles)->with('cargos',$cargos)
        ->with('profesor',$profesor);
    } 

    public function update(Request $request, $id){
        $profesor = Profesor::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:40',
            'user' => 'required|string|max:20|unique:users,user,'.$profesor->user->id,
            'identidad' => 'required|string|numeric|unique:users,identidad,'.$profesor->user->id,
            'cargo' => 'required|exists:cargos,id',
            'rol' => 'required|exists:roles,name',
        ]);

        $profesor = Profesor::findOrFail($id);

        $user = User::findOrFail($profesor->user->id);
        $user->name = $request->input('name');
        $user->user = $request->input('user');
        $user->identidad = $request->input('identidad');

        $creado =  $user->save();

        DB::table('model_has_roles')->where('model_id', $profesor->user->id)->delete();

        $user->assignRole($request->input('rol'));

        $profesor->id_cargos = $request->input('cargo');
        $profesor->funcion = $request->input('rol');

        $creado2 =  $profesor->save();

        return redirect()->route('profesor.index')->with('mensaje','el profesor fue editado exitosamente');
    }


    public function destroy($id)
    {
        $planilla = Profesor::find($id);
        $planilla->delete();
        $profesors = Profesor::all();
        return view('profesor/index')->with('profesors',$profesors)->with('mensaje','La planilla fue eliminado exitosamente');
    }

}
