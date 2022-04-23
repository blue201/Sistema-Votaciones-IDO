<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
    public function index()
    {
        
        //$matricula = Matricula::all();
        return view('auth/login2'); 
    }

    public function elecciones(){
        
        $planillas = Planilla::join('candidatos','candidatos.id_planilla','=','planillas.id')
        ->join('verificacion_planillas','verificacion_planillas.id_planilla','=','planillas.id')
        ->where('verificacion_planillas.verificacion', 1)
        ->where('candidatos.id_cargo',1)
        ->select('planillas.*', 'candidatos.name AS nombre', 'candidatos.foto AS imagen')
        ->get();
        
        return view('elecciones')->with('planillas',$planillas);
    } 

    public function consulta($dni)
    {
        $User = User::findorfail($dni);
        return view('welcome');
    }

    public function create($id)
    {
        //$User = User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::where('RNE_Alumno',$id)->get();

        return $matricula;  
    }

    
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
