<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Modalidad;
use App\Models\Planilla;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
   
  


    public function index()
    {
        return view('auth/login'); 
    }

    

    public function elecciones(){
        $modalidads = Modalidad::all();
        $planillas = Planilla::join('candidatos','candidatos.id_planilla','=','planillas.id')
        ->join('verificacion_planillas','verificacion_planillas.id_planilla','=','planillas.id')
        ->where('verificacion_planillas.verificacion', 1)
        ->where('candidatos.id_cargo',1)
        ->select('planillas.*', 'candidatos.name AS nombre', 'candidatos.foto AS imagen')
        ->get();
        
        return view('elecciones')->with('planillas',$planillas)->with('modalidads',$modalidads);
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

    
    public function store(Request $request)
    {
        $candidatos = User::all()->where('identidad',$request->identidad);

        foreach ($candidatos as $c) {
            $alu= $c->identidad;
            $nombre=$c->name;
            $voto=$c->voto;

            if ($request->identidad==$alu) {
                
                $planillas = Planilla::join('candidatos','candidatos.id_planilla','=','planillas.id')
                ->join('verificacion_planillas','verificacion_planillas.id_planilla','=','planillas.id')
                ->where('verificacion_planillas.verificacion', 1)
                ->where('candidatos.id_cargo',1)
                ->select('planillas.*', 'candidatos.name AS nombre', 'candidatos.foto AS imagen')
                ->get();
                
                return view('elecciones')->with('planillas',$planillas)->with('candidatos',$candidatos);
            
                //header("location: principal.php");  
            }else {
                return view('votar')->with('identidad no se encuentra registrada');
            }
            return view('votar')->with('identidad no se encuentra registrada');
        }
        return view('votar')->with('identidad no se encuentra registrada');
    }
    public function show()
    {
        return view('votar');
    }

    
    public function edit($id)
    {
        
    }

    
    public function destroy($id)
    {
        //
    }
}
