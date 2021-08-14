<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaContacto extends Model
{
    use HasFactory;
    protected $table='programa_contactos';
    public function detalle_plan_medios(){
        return $this->HasMany(DetallePlanMedio::class,'idProgramaContacto');
    }
    public function persona(){
        return $this->belongsTo(Persona::class,'idContacto');
    }

    public function programa(){
        return $this->belongsTo(Programa::class,'programa_id');
    }
}
