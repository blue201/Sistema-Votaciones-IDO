<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estudiante;
use App\Models\Planilla;
use Illuminate\Support\Facades\Gate;

class EstudianteController extends Controller
{
    public function welcome(){
        abort_if(Gate::denies('welcome'), redirect()->route('elecciones'));
        return view('welcome');
    }

    public function elecciones(){
        abort_if(Gate::denies('elecciones'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        
        $planillas = Planilla::join('candidatos','candidatos.id_planilla','=','planillas.id')
        ->join('verificacion_planillas','verificacion_planillas.id_planilla','=','planillas.id')
        ->where('verificacion_planillas.verificacion', 1)
        ->where('candidatos.id_cargo',1)
        ->select('planillas.*', 'candidatos.name AS nombre', 'candidatos.foto AS imagen')
        ->get();
        
        return view('elecciones')->with('planillas',$planillas);
    }

    public function index(){
        abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::all();
        return view('estudiantes/index')->with('estudiantes',$estudiante);
    }
 
    public function show($id){
        abort_if(Gate::denies('estudiante.show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes/show')->with('estudiante',$estudiante);
    }


}
