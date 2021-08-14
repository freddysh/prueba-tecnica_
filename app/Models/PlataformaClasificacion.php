<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlataformaClasificacion extends Model
{
    use HasFactory;
    protected $table='plataforma_clasificacions';
    public function medios_plataformas(){
        return $this->HasMany(MedioPlataforma::class,'idPlataformaClasificacion');
    }

    public function plataforma(){
        return $this->belongsTo(Plataforma::class,'plataforma_id');
    }
}
