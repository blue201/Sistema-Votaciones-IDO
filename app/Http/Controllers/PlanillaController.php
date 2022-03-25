<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planilla;
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
       /* $request->validate([
            'name' => 'required|string|max:40',
            'lema' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpg,jpej,png,git,svg|max:2048',
            'propuesta' => 'required|file|mimes:pdf,docx,doc|max:2000',
        ]);
        */
  
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
            $planilla ->foto = $imgname;
            $planilla ->lema = $request->lema;
            $planilla ->modalidad = $request->modalidad;
            $planilla->propuesta =  $pdfname;
            $planilla->save();

         return redirect()->route('planillaa.index')->with('mensaje','la planilla fue creado exitosamente');
         
        }else
        {
            return with('mensaje','el profesor fue creado exitosamente');
        }
     
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
