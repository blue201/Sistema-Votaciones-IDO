<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',   
    ];

    public function planilla(){
        return $this->hasMany(Planilla::class);
    }

    public function modalidads(){
        return $this->belongsTo(Modalidad::class, 'modalidad', 'id');
    }
}
