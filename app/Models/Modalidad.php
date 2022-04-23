<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',   
    ];

    public function estudiante(){
        return $this->hasMany(Estudiante::class);
    }
    public function planilla(){
        return $this->hasMany(Planilla::class);
    }
}
