<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Planilla;
use App\Models\CargoPolitico;
use App\Models\verificacion_planilla;
use Illuminate\Support\Facades\Gate;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CandidatoController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('candidato.index'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $candidatos = Candidato::all();
        return view('formularios/index')->with('candidatos',$candidatos); 
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

        $cargos = CargoPolitico::all();

        foreach ($cargos as $c) {
            $request->validate([
                'planilla' => 'required|unique:verificacion_planillas,id_planilla|exists:planillas,id',
                'seleccionArchivos'.$c->id => 'required',
            ]);
        }

    
            
         
        foreach ($cargos as $c) {
            
            $img = $request->file('seleccionArchivos'.$c->id);
            $destimg = 'images/imgcandidato/'; 
            $filename = time() . '.' . $img->getClientOriginalName();
            $uplosucess = $request->file('seleccionArchivos'.$c->id)->move($destimg, $filename);
            $candidato = new Candidato();
            $candidato ->name = $request->input('nombre'.$c->id); 
            $candidato ->foto = 'images/imgcandidato/'.$filename;
            $candidato ->identidad = $request->input('id'.$c->id);
            $candidato ->id_cargo = $c->id;
            $candidato ->id_planilla = $request->input('planilla');
            $candidato->save();
        }

        $verificar = new verificacion_planilla();

        $verificar->id_planilla = $request->input('planilla');
        $verificar->verificacion = 1;
        $verificar->save();

        return redirect()->route('candidato.index')->with('mensaje','el profesor fue creado exitosamente');
        
    }

  
    public function show($id)
    {
        
        

        return $id;
    }

   
    public function edit($id)
    {
        abort_if(Gate::denies('planilla.edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $planillas = Planilla::all();
        $cargo_politicos = CargoPolitico::all(); 
        $planilla = Planilla::find($id);
        $candidatos = Candidato::where('id_planilla',$id)->get();
        return view('formularios/edit')->with('planilla',$planilla)->with('cargo_politicos',$cargo_politicos)->with('planillas',$planillas)->with('candidatos',$candidatos);
    }

   
    public function update(Request $request, $id)
    {
      /* $cargos = CargoPolitico::findOrFail($c->id);

        foreach ($cargos as $c) {
            $request->validate([
                'planilla' => 'required|unique:verificacion_planillas,id_planilla|exists:planillas,id',
                'seleccionArchivos'.$c->id => 'required',
            ]);
        }

    
            
         
        foreach ($cargos as $c) {
            
            $img = $request->file('seleccionArchivos'.$c->id);
            $destimg = 'images/imgcandidato/'; 
            $filename = time() . '.' . $img->getClientOriginalName();
            $uplosucess = $request->file('seleccionArchivos'.$c->id)->move($destimg, $filename);
            $candidato = new Candidato();
            $candidato ->name = $request->input('nombre'.$c->id); 
            $candidato ->foto = 'images/imgcandidato/'.$filename;
            $candidato ->identidad = $request->input('id'.$c->id);
            $candidato ->id_cargo = $c->id;
            $candidato ->id_planilla = $request->input('planilla');
            $candidato->save();
        }

        $verificar = new verificacion_planilla();

        $verificar->id_planilla = $request->input('planilla');
        $verificar->verificacion = 1;
        $verificar->save();

        return redirect()->route('candidato.index')->with('mensaje','el profesor fue creado exitosamente');
    */
    return edit;
    }

   
    public function destroy($id)
    {
        $candidatos = Candidato::find($id);
        $candidatos->delete();
        return view('formularios/index')->with('mensaje','el candidato fue eliminado exitosamente');
    }
}
