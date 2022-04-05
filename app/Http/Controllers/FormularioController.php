<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Http\Controllers\Planilla;
use App\Models\CargoPolitico;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    

    public function index(){
        abort_if(Gate::denies('planilla.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('formularios/planilla');
    }


    public function create()
    {
        abort_if(Gate::denies('planilla.create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        //$candidatos = Candidato::all();
       
       // $candidatos = DB::table('candidatos')->where('id_cargo','1')->get();
        $candidatos = Candidato::all()->where('id_cargo','1');
        return view('formularios/candidatos')->with('candidatos',$candidatos); 
    }

    public function store(Request $request)
    {

    }
        
    public function show($id)
    {
       // $candidato = Candidato::find($id);

       $candidato = Candidato::with('planilla','cargopolitico')->where('id','=', $id);
       // $candidato = DB::table('candidatos')->where('id_cargo',$id)->GET();
       // $data = ['candidato' =>  $candidato,];
       return view('formularios/planilla')->with('candidato',$candidato);
    }

    public function destroy($id)
    {
        
    }
}
