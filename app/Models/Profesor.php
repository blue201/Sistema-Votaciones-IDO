<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cargos',
        'id_user',  
        'funcion',  
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_cargos', 'id');
    }

}
