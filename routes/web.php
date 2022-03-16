<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FormularioController;
<<<<<<< Updated upstream
use App\Http\Controllers\CatalogoController;

=======
use App\Http\Controllers\CandidatoController;
>>>>>>> Stashed changes
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware("auth")->group(function () {
    Route::get('profesor', [ProfesorController::class, 'index'])->name('profesor.index');
    Route::get('profesor/nuevo', [ProfesorController::class, 'create'])->name('profesor.nuevo');
    Route::post('profesor/nuevo', [ProfesorController::class, 'store']);
    Route::get('profesor/{id}', [ProfesorController::class, 'show'])->name('profesor.ver')->where('id', '[0-9]+');
    Route::get('profesor/editar/{id}', [ProfesorController::class, 'edit'])->name('profesor.edit')->where('id', '[0-9]+');
    Route::put('profesor/editar/{id}', [ProfesorController::class, 'update'])->name('profesor.update')->where('id', '[0-9]+');
    
    Route::get('estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
    Route::get('estudiante/{id}', [EstudianteController::class, 'show'])->name('estudiante.ver')->where('id', '[0-9]+');
    Route::get('elecciones', [EstudianteController::class, 'elecciones'])->name('elecciones');

    Route::get('candidatos', [CandidatoController::class, 'index'])->name('candidato.index');
    Route::get('candidatos/nuevo', [CandidatoController::class, 'create'])->name('candidato.create');
    Route::post('candidatos', [CandidatoController::class, 'store'])->name('candidato.store');
    Route::get('candidatos/{id}', [CandidatoController::class, 'show'])->name('candidatos.show');
    Route::get('candidatos/{id}/edit', [CandidatoController::class, 'edit'])->name('candidatos.edit');
    Route::put('candidatos/{id}', [CandidatoController::class, 'update'])->name('candidatos.update');
    Route::delete('candidatos/{id}', [CandidatoController::class, 'destroy'])->name('candidatos.destroy');
    
    Route::get('planilla', [FormularioController::class, 'index'])->name('planilla.index');
    Route::get('planilla/nuevo', [FormularioController::class, 'create'])->name('planilla.create');

    Route::get('/', [EstudianteController::class, 'welcome'])->name('welcome');

    Route::get('cargo', [CatalogoController::class, 'cargoindex'])->name('cargo');
    Route::get('curso', [CatalogoController::class, 'cursoindex'])->name('curso');
    Route::get('grupo', [CatalogoController::class, 'grupoindex'])->name('grupo');
    Route::get('modalidad', [CatalogoController::class, 'modalidadindex'])->name('modalidad');
    Route::get('jornada', [CatalogoController::class, 'jornadaindex'])->name('jornada');

    Route::post('cargo', [CatalogoController::class, 'cargostore'])->name('cargostore');
    Route::post('curso', [CatalogoController::class, 'cursostore'])->name('cursostore');
    Route::post('grupo', [CatalogoController::class, 'grupostore'])->name('grupostore');
    Route::post('modalidad', [CatalogoController::class, 'modalidadstore'])->name('modalidadstore');
    Route::post('jornada', [CatalogoController::class, 'jornadastore'])->name('jornadastore');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
