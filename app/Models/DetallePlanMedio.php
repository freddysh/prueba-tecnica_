<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePlanMedio extends Model
{
    use HasFactory;

    protected $table='detalle_plan_medios';
    public function plan_medio(){
        return $this->belongsTo(PlanMedio::class,'idPlanMedio');
    }
    public function programa_contacto(){
        return $this->belongsTo(ProgramaContacto::class,'idProgramaContacto');
    }
}
