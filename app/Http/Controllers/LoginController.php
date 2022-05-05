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
   
    public function update(Request $request, $dni) 
    {

        $user = User::findOrFail($dni);
        return  $user;

        /*//validar pdf
        if($request->hasfile('propuesta')){
            //pdf planilla
            $archivo = $request->file('propuesta');
            $pdfname = time() . '-' . $archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivo/',$pdfname);
            $planilla ->id = $request->id;
            $planilla ->name = $request->name;
            $planilla ->lema = $request->lema;
            $planilla ->id_modalidad = $request->modalidad;
            $planilla->propuesta =  $pdfname;
            $planilla->save();
            return redirect()->route('planillaa.index')->with('mensaje','la planilla fue editada exitosamente');
         
        }else 
        {
            if($request->hasfile('foto')){
                //imagen planilla
                $img = $request->file('foto');
                $destimg = 'images/imgplanilla/';
                $imgname = time() . '-' . $img->getClientOriginalName();
                $uplosucess = $request->file('foto')->move($destimg, $imgname);
                $planilla ->id = $request->id;
                $planilla ->name = $request->name;
                $planilla ->foto = $imgname;
                $planilla ->lema = $request->lema;
                $planilla ->id_modalidad = $request->modalidad;
                $planilla->save();
                return redirect()->route('planillaa.index')->with('mensaje','la planilla fue editada exitosamente');
         
            }else 
            { 
                $planilla ->id = $request->id;
                $planilla ->name = $request->name;
                $planilla ->lema = $request->lema;
                $planilla ->id_modalidad = $request->modalidad;
                $planilla->save();

                return redirect()->route('planillaa.index')->with('mensaje','la planilla fue editada exitosamente');
         
            }*/
    }

    public function validar($dni){
        
        
        return $dni;

       /* $candidatos = Candidato::all()->where('id_planilla',$id);

        $sql="SELECT * FROM users WHERE identidad = '$alumno' AND voto = '0'";
        $resultado=mysqli_query ($cx,$sql);
        $datos=mysqli_fetch_array($resultado);
        $alu=$datos["identidad"];
                $name=$datos["name"];
        $voto=$datos["voto"];


        if ($alumno==$alu) {
            $_SESSION["name"]=$datos["name"];
            $_SESSION["carrera"]=$datos["carrera"];
            $_SESSION["identidad"]=$datos["identidad"];
                $_SESSION["permiso"]="Acceso Permitido";

        
            <script>

            window.location="{{route('elecciones')}}";
            </script>

        
            //header("location: principal.php"); 
        }else {
            $acceso="denegado";
        }
        break;
        <?php
 
			if ($acceso=="denegado") {
			  echo "<font size='5' color='white'>".$_SESSION["name"]."<br> Usted ya realizo su voto</font>";
			}
			
			
			?>
        }
        }
*/

        
    }


    public function index()
    {
        return view('auth/login'); 
    }

    public function login2()
    {
        return view('auth/login2'); 
    }



    public function dni($dni)
    {
        return view('login2');
        
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
                return 'identidad no se encuentra registrada';
            }
            
        }
    }
    public function show($id)
    {
        $matricula = Matricula::where('RNE_Alumno',$id)->get();

        return $matricula;  
    }

    
    public function edit($id)
    {
        
    }

    
    public function destroy($id)
    {
        //
    }
}
