<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanMedio extends Model
{
    use HasFactory;
    public function detalle_plan_medio(){
        return $this->HasMany(DetallePlanMedio::class,'idPlanMedio');
    }
    public function campaing(){
        return $this->belongsTo(Campaign::class,'campaign_id');
    }
}
