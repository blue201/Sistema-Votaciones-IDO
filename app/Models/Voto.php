<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',  
        'id_planilla',  
    ];

    public function planillas(){
        return $this->belongsTo(Planilla::class,'id_planilla','id');
    }
}
