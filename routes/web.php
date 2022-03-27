<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\PlanillaController;

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
    Route::get('candidatos/{id}', [CandidatoController::class, 'show'])->name('candidato.show');
    Route::get('candidatos/{id}/edit', [CandidatoController::class, 'edit'])->name('candidato.edit');
    Route::put('candidatos/{id}', [CandidatoController::class, 'update'])->name('candidato.update');
    Route::delete('candidato/{id}', [CandidatoController::class, 'destroy'])->name('candidato.destroy');

    Route::get('planilla', [PlanillaController::class, 'index'])->name('planillaa.index');
    Route::get('planilla/nuevo', [PlanillaController::class, 'create'])->name('planillaa.create');
    Route::post('planilla', [PlanillaController::class, 'store'])->name('planilla.store');
    Route::get('planilla/{id}', [PlanillaController::class, 'show'])->name('planilla.show');
    Route::get('planilla/{id}/edit', [PlanillaController::class, 'edit'])->name('planilla.edit');
    Route::put('planilla/{id}', [PlanillaController::class, 'update'])->name('planilla.update');
    Route::delete('planilla/{id}', [PlanillaController::class, 'destroy'])->name('planilla.destroy');
    
    Route::get('planillas', [FormularioController::class, 'index'])->name('planilla.index');
    Route::get('planillas/nuevo', [FormularioController::class, 'create'])->name('planilla.create');
    Route::get('planillas/{id}', [FormularioController::class, 'show'])->name('planilla.mostrar');

    Route::get('/', [EstudianteController::class, 'welcome'])->name('welcome');

    Route::get('cargo', [CatalogoController::class, 'cargoindex'])->name('cargo');
    Route::get('curso', [CatalogoController::class, 'cursoindex'])->name('curso');
    Route::get('grupo', [CatalogoController::class, 'grupoindex'])->name('grupo');
    Route::get('modalidad', [                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     xcx::class, 'modalidadindex'])->name('modalidad');
    Route::get('jornada', [CatalogoController::class, 'jornadaindex'])->name('jornada');

    Route::post('cargo', [CatalogoController::class, 'cargostore'])->name('cargo');
    Route::post('curso', [CatalogoController::class, 'cursostore'])->name('curso');
    Route::post('grupo', [CatalogoController::class, 'grupostore'])->name('grupo');
    Route::post('modalidad', [CatalogoController::class, 'modalidadstore'])->name('modalidad');
    Route::post('jornada', [CatalogoController::class, 'jornadastore'])->name('jornada');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
