<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
class CandidatoController extends Controller
{
    
    public function index()
    {
        $candidatos = Candidato::all();
        $data = [
            'candidatos'=> $candidatos,
        ];

        return view('formularios/index',$data);
    }

   
    public function create()
    {
        abort_if(Gate::denies('candidato.create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $roles = DB::table('roles')->get();
        return view('formularios/regcandidato')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        
       

        $candidato = new Candidato();
        $candidato ->id = $request->id;
        $candidato ->name = $request->name;
        $candidato ->identidad = $request->identidad;
        $candidato ->user = $request->user;
        $candidato ->password = $request->password;
        $candidato ->puesto = $request->puesto;
        $candidato ->rol = $request->rol;
        $candidato->save();

        return redirect()->route('candidato.index')->with('mensaje','el profesor fue creado exitosamente');
    }

  
    public function show($id)
    {
        
        return 'show';
    }

   
    public function edit($id)
    {
       

        return 'edit';
    }

   
    public function update(Request $request, $id)
    {
        return 'update';
    }

   
    public function destroy($id)
    {
        return 'destroy';
    }
}
