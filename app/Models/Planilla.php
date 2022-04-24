<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_modalidad', 
        'name', 
    ];

    public function planilla(){
        return $this->hasMany(Planilla::class);
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class, 'id_modalidad', 'id'); 
    }

    public function candidato(){
        return $this->hasMany(Candidato::class);
    }
}
