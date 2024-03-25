<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $guarded = [];

    protected $appends = ['calificacion_final'];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }

    public function getCalificacionFinalAttribute() {

        $calificacion = $this->calificacion + $this->discapacidad + $this->lgbtttiq;

        return $calificacion >  config('constants.calificacion_maxima')
            ?  config('constants.calificacion_maxima')
            : $calificacion;
    }
}
