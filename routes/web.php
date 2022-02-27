<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FormularioController;

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

    Route::get('candidatos', [FormularioController::class, 'candidatos'])->name('candidatos');

    Route::get('planilla', [FormularioController::class, 'planilla'])->name('planilla');

    Route::get('/', [EstudianteController::class, 'welcome'])->name('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
