<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_modalidad',
        'id_cursos',
        'id_grupos',
        'id_jornadas',
        'id_user',    
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class, 'id_modalidad', 'id');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'id_cursos', 'id');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupos', 'id');
    }

    public function jornada(){
        return $this->belongsTo(Jornada::class, 'id_jornadas', 'id');
    }

}
