<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contratos extends Model
{
    protected $table = 'contratos';
    protected $guarded = [];

    protected $appends = ['calificacion_final','calificacion_final_porcentaje'];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }

    public function getCalificacionFinalAttribute() {

        $calificacion = $this->calificacion + $this->discapacidad + $this->lgbtttiq;

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