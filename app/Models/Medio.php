<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    use HasFactory;
    protected $table='medios';
    public function medios_plataforma(){
        return $this->HasMany(MedioPlataforma::class,'medio_id');
    }
    public function programas(){
        return $this->HasMany(Programa::class,'medio_id');
    }
}
