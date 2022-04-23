<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planilla;
use App\Models\Candidato;
use App\Models\Modalidad;
use Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlanillaController extends Controller
{
    
    public function index()
    {
        $planillas = Planilla::all();
        $data = [
            'planillas'=> $planillas,
        ];
        return view('planilla/index',$data);
    }

    
    public function create()
    {
        abort_if(Gate::denies('planillaa.create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $modalidads = DB::table('modalidads')->get();
        return view('planilla/registro')->with('modalidads',$modalidads);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'lema' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpg,jpej,png,git,svg|max:2048',
            'propuesta' => 'required|file|mimes:pdf',
            'modalidad' => 'required|exists:modalidads,id|unique:planillas,modalidad'
        ]);
  
        $planilla = new Planilla();

        if($request->hasfile('foto'))
        {
            //imagen planilla
            $img = $request->file('foto');
            $destimg = 'images/imgplanilla/';
            $imgname = time() . '-' . $img->getClientOriginalName();
            $uplosucess = $request->file('foto')->move($destimg, $imgname);

            $archivo = $request->file('propuesta');
            $pdfname = time() . '-' . $archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivo/',$pdfname);

            $planilla ->id = $request->id;
            $planilla ->name = $request->name;
            //$planilla ->foto =  $destimg . $imgname; guardar ruta e imagen
            $planilla ->foto = $imgname;
            $planilla ->lema = $request->lema;
            $planilla ->modalidad = $request->modalidad;
            $planilla->propuesta =  $pdfname;
            $planilla->save();

         return redirect()->route('planillaa.index')->with('mensaje','la planilla fue creado exitosamente');
         
        }else
        {
            return with('mensaje','error al crear planilla');
        }
     
    }

    
    public function show($id)
    {
        $candidatos = Candidato::where('id_planilla',$id)->get();
        return view('planilla/candidatos')->with('candidatos',$candidatos);
    }

    
    public function edit($id)
    {
        abort_if(Gate::denies('planilla.edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
       // $modalidads = DB::table('modalidads'); 
        $modalidads = Modalidad::all(); 
        $planilla = Planilla::findorfail($id); 
        return view('planilla/edit')->with('planilla',$planilla)->with('modalidads',$modalidads);
    }

    
    public function update(Request $request, $id)
    {

        $planilla = Planilla::findOrFail($id);

        //validar pdf
        if($request->hasfile('propuesta')){
            //pdf planilla
            $archivo = $request->file('propuesta');
            $pdfname = time() . '-' . $archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivo/',$pdfname);
        }else { $pdfname =$planilla->propuesta;}


        //validar imag
        if($request->hasfile('foto')){
            //imagen planilla
            $img = $request->file('foto');
            $destimg = 'images/imgplanilla/';
            $imgname = time() . '-' . $img->getClientOriginalName();
            $uplosucess = $request->file('foto')->move($destimg, $imgname);
        }else { $imgname =$planilla->foto;}
          
        




            $planilla ->id = $request->id;
            $planilla ->name = $request->name;
            $planilla ->foto = $imgname;
            $planilla ->lema = $request->lema;
            $planilla ->id_modalidad = $request->modalidad;
            $planilla->propuesta =  $pdfname;
            $planilla->save();

         return redirect()->route('planillaa.index')->with('mensaje','la planilla fue editada exitosamente');
         
        
        
    }

    public function destroy($id)
    {
        $planilla = Planilla::find($id);
        $planilla->delete();
        $planillas = Planilla::all();
        $data = [
            'planillas'=> $planillas,
        ];
        return view('planilla/index',$data)->with('mensaje','La planilla fue eliminado exitosamente');
    }
}
