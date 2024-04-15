<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $guarded = [];

    protected $appends = ['calificacion_final','calificacion_final_porcentaje'];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }

    public function getCalificacionFinalAttribute() {

        $aspirante = $this->aspirante()->first();
        $discapacidad = $aspirante?->p15_discapacidad == 'Si' ? 1: 0;
        $lgbtttiq     = $aspirante?->persona_lgbtttiq == 'Si' ? 1: 0;
        $calificacion = $this->calificacion + $discapacidad + $lgbtttiq;

        return $calificacion >  config('constants.calificacion_maxima')
            ?  config('constants.calificacion_maxima')
            : $calificacion;
    }

    public function getCalificacionFinalPorcentajeAttribute() {

        $porcentaje = $this->calificacion_final * config('constants.porcentaje_examen') / config('constants.calificacion_maxima');

        return $porcentaje >  config('constants.porcentaje_examen')
            ?  config('constants.porcentaje_examen')
            : $porcentaje;
    }
}
