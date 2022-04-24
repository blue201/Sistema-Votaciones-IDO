<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoPolitico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',   
    ];
    
    public function cargopolitico(){
        return $this->hasMany(CargoPolitico::class);
    }
}
