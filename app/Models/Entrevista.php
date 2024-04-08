<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrevista extends Model
{
    protected $table = 'entrevistas';

    protected $casts = ['competencias' => 'json'];

    protected $appends = ['puntos','calificacion'];
    protected $guarded = [];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }

    public function getPuntosAttribute() {

        $puntos = 0;
        foreach($this->competencias ?? [] as $competencia)
            $puntos += $competencia['valor_respuesta'];

        return $puntos;
    }

    public function getCalificacionAttribute() {

        $puntos = $this->puntos;

        $porcentaje = ($puntos * config('constants.calificacion_maxima_entrevista')) / 100;

        if ($this->habla_indigena === 'SI')
            $porcentaje = $porcentaje +  1;

        return $porcentaje > config('constants.calificacion_maxima_entrevista') ? number_format(config('constants.calificacion_maxima_entrevista'),2) : number_format($porcentaje,2);
    }

    public function getCalificacionFinalPorcentajeAttribute() {

        $porcentaje = $this->calificacion * config('constants.porcentaje_entrevista') / config('constants.calificacion_maxima_entrevista');

        return $porcentaje >  config('constants.porcentaje_entrevista')
            ?  config('constants.porcentaje_porcentaje_entrevista')
            : $porcentaje;
    }

}
