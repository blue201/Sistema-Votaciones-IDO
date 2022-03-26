<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public function planillas(){
        return $this->belongsTo(Planilla::class, 'id_planilla', 'id');
    }

    public function cargos(){
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }
}
