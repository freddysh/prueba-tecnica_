<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedioPlataforma extends Model
{
    use HasFactory;

    protected $table='medio_plataformas';
    public function plataforma_clasificacion(){
        return $this->belongsTo(PlataformaClasificacion::class,'idPlataformaClasificacion');
    }
}
