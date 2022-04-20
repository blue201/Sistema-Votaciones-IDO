<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estudiante;
use App\Models\Candidato;
use App\Models\Planilla;
use App\Models\Voto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function welcome(){
        abort_if(Gate::denies('welcome'), redirect()->route('elecciones'));

        $votos = Planilla::select(DB::raw('planillas.id, name, COUNT(id_planilla) as votos'))
        ->leftjoin('votos','votos.id_planilla','=','planillas.id')
        ->groupby('planillas.id')
        ->get();

        return view('welcome')->with('votos', $votos);
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

    public function calculo(Request $request){

        Voto::create([
            'id_user' => Auth()->user()->id,
            'id_planilla' => $request->input('muhRadio'),
        ]);

        $estudiante = User::findOrFail(auth()->user()->id);
        $estudiante->voto = 1;
        $estudiante->save();

        return redirect()->route('elecciones');

    }

    public function candidatos($id){

        $candidatos = Candidato::where('id_planilla',$id)->get();

        return view('candidatos')->with('candidatos',$candidatos);
    }

    public function index(){
        abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::all();
        return view('estudiantes/index')->with('estudiantes',$estudiante)->with('titulo','Estudiantes registrados');
    }

    public function votaron(){
        //abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::join('users','id_user','=','users.id')->select('estudiantes.*')->where('voto',1)->get();
        return view('estudiantes/index')->with('estudiantes',$estudiante)->with('titulo','Estudiantes que ya votaron');
    }

    public function sinvotar(){
        //abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::join('users','id_user','=','users.id')->select('estudiantes.*')->where('voto',0)->get();
        return view('estudiantes/index')->with('estudiantes',$estudiante)->with('titulo','Estudiantes sin votar');
    }
 
    public function show($id){
        abort_if(Gate::denies('estudiante.show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes/show')->with('estudiante',$estudiante);
    }

    public function voto(){
        //abort_if(Gate::denies('estudiante.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $estudiante = Estudiante::join('users','id_user','=','users.id')
        ->join('votos','votos.id_user','=','users.id')
        ->join('planillas','planillas.id','=','votos.id_planilla')
        ->select(DB::raw('estudiantes.*, planillas.name AS planilla, votos.created_at AS hora_votacion'))
        ->where('voto',1)
        ->get();
        return view('estudiantes/index')->with('estudiantes',$estudiante)->with('titulo','Voto de cada estudiante')->with('votacion','si voto');
    }


}
