<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $table='programas';
    public function programa_contactos(){
        return $this->HasMany(ProgramaContacto::class,'programa_id');
    }

    public function medio(){
        return $this->belongsTo(Medio::class,'medio_id');
    }
}
