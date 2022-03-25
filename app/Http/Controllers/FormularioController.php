<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidatos;
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
        $candidatos = DB::table('candidatos')->get();
        return view('formularios/candidatos')->with('candidatos',$candidatos);
    }

    public function store(Request $request)
    {

    }
        
}
