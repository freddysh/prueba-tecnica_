<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;
    protected $table='plataformas';
    public function plataforma_clasificaciones(){
        return $this->HasMany(PlataformaClasificacion::class,'plataforma_id');
    }
}
