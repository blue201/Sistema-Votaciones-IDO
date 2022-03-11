<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',   
    ];
    public function estudiante(){
        return $this->hasMany(Estudiante::class);
    }
}
