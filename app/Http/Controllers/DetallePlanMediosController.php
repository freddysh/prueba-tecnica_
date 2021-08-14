<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetallePlanMedio;
use App\Models\MedioPlataforma;
use Illuminate\Http\Request;

class DetallePlanMediosController extends Controller
{
    //
    function getDetallePlanMedios(){
        try {
            $planes_medios=DetallePlanMedio::with(['plan_medio.campaing.cliente','programa_contacto.persona','programa_contacto.programa.medio'])->get();
            $planes_de_medios=[];
            foreach($planes_medios as $valor){
                $medioPlataforma=explode(',',$valor->idsMedioPlataforma);
                $medioPlataforma=MedioPlataforma::with('plataforma_clasificacion.plataforma')->whereIn('id',$medioPlataforma)->get();
                $plataformas='';
                foreach($medioPlataforma as $medioPlataforma_){
                    $plataformas.=$medioPlataforma_->plataforma_clasificacion->plataforma->descripcion.':'.$medioPlataforma_->valor.',';
                }
                $plataformas=substr($plataformas,0,strlen($plataformas)-1);
                $planes_de_medios[]=Array(
                    'id'=>$valor->id,
                    'cliente'=>Cliente::find($valor->plan_medio->campaing->cliente_id)->nombreComercial,
                    'campania'=>$valor->plan_medio->campaing->titulo,
                    'planMedio'=>$valor->plan_medio->nombre,
                    'periodista'=>$valor->programa_contacto->persona->nombres.' '.$valor->programa_contacto->persona->apellidos,
                    'medio:programa'=>$valor->programa_contacto->programa->medio->nombre.' : '.$valor->programa_contacto->programa->nombre,

                    'plataformas'=>$plataformas,
                    'tipoNota'=>$valor->tipoNota,
                    'estado'=>$valor->statusPublicado,
                );
            }
            return $planes_de_medios;
        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
    }
}
