<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Curso;
use App\Models\Grupo;
use App\Models\Jornada;
use App\Models\Modalidad;
use Illuminate\Http\Request;
use App\Http\Requests\StoreModalidadRequest;
use App\Http\Requests\UpdateModalidadRequest;

class CatalogoController extends Controller
{

    public function cargoindex(){
        $cargo = Cargo::all(); 

        return view('catalogo\cargo')->with('cargos',$cargo);
    }

    public function cargostore(Request $request){
        $request->validate([
            'descripcion' => 'required',
        ]);

        Cargo::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('cargo.index')->with('mensaje','el cargo fue creado exitosamente');

    }

    public function cursoindex(){
        $curso = Curso::all();

        return view('catalogo\curso')->with('cursos',$curso);
    }

    public function cursostore(Request $request){
        $request->validate([
            'descripcion' => 'required',
        ]);

        Curso::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('curso.index')->with('mensaje','el curso fue creado exitosamente');

    }

    public function grupoindex(){
        $grupo = Grupo::all();

        return view('catalogo\grupo')->with('grupos',$grupo);
    }

    public function grupostore(Request $request){
        $request->validate([
            'descripcion' => 'required',
        ]);

        Grupo::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('grupo.index')->with('mensaje','el grupo fue creado exitosamente');

    }

    public function modalidadindex(){
        $modalidad = Modalidad::all();

        return view('catalogo\modalidad')->with('modalidads',$modalidad);
    }

    public function modalidadstore(Request $request){
        $request->validate([
            'descripcion' => 'required',
        ]);

        Modalidad::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('modalidad.index')->with('mensaje','el modalidad fue creado exitosamente');

    }

    public function jornadaindex(){
        $jornada = Jornada::all();

        return view('catalogo\jornada')->with('jornadas',$jornada);
    }

    public function jornadastore(Request $request){
        $request->validate([
            'descripcion' => 'required',
        ]);

        Jornada::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('jornada.index')->with('mensaje','el jornada fue creado exitosamente');

    }

}
