<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Facades\Gate;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $planillas = DB::table('planillas')->get();
        $cargo_politicos = DB::table('cargo_politicos')->get();
        return view('formularios/regcandidato')->with('planillas',$planillas)->with('cargo_politicos',$cargo_politicos);
    }

    public function store(Request $request)
    {
        $candidato = new Candidato();

        if($request->hasfile('foto') )
        {
            
            //imagen candidato
            $img = $request->file('foto');
            $destimg = 'images/imgcandidato/';
            $imgname = time() . '-' . $img->getClientOriginalName();
            $uplosucess = $request->file('foto')->move($destimg, $imgname);


        
         
        $candidato ->id = $request->id;
        $candidato ->name = $request->name;
        $candidato ->foto = $imgname;
        $candidato ->identidad = $request->identidad;
        $candidato ->id_cargo = $request->cargoPoli;
        $candidato ->id_planilla = $request->planilla;
        $candidato->save();

        return redirect()->route('candidato.index')->with('mensaje','el profesor fue creado exitosamente');
        }else{return "hola";}
        
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
