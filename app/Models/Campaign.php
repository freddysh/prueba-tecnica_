<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table='campaigns';
    public function plan_medios(){
        return $this->HasMany(PlanMedio::class,'campaign_id');
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}
