<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FormularioController extends Controller
{
    public function planilla(){
        abort_if(Gate::denies('planilla'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('formularios/planilla');
    }

    public function candidatos(){
        abort_if(Gate::denies('candidatos'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('formularios/candidatos');
    }
}
