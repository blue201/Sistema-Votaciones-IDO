<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
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
        $candidatos = DB::table('candidatos')->where('cargoPoli','Precidente')->get();
        return view('formularios/candidatos')->with('candidatos',$candidatos);
    }

    public function store(Request $request)
    {

    }
        
    public function show($id)
    {
        $candidato = Candidato::find($id);
        $data = ['candidato' =>  $candidato,];
            return view('formularios/planilla')->with('data',$data);
    }

    public function destroy($id)
    {
        
    }
}
