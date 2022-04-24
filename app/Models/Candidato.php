<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cargo',
        'id_planilla',
    ];

    public function candidato(){
        return $this->hasMany(Candidato::class);
    }

    public function planilla(){
        return $this->belongsTo(Planilla::class, 'id_planilla', 'id');
    }

    public function cargoPolitico(){
        return $this->belongsTo(CargoPolitico::class, 'id_cargo', 'id');
    }
}
