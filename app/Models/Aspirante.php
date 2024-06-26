<?php

namespace App\Models;


use FontLib\TrueType\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspirante extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['experiencia_laboral' => 'json'];

   // protected $with     = ['evaluacion'];

    const ESTATUS_PENDIENTE   = 'Pendiente';
    const ESTATUS_ACEPTADO    = 'Aceptado';
    const ESTATUS_NO_ACEPTADO = 'No aceptado';
    const ESTATUS_EVALUADO = 'Evaluado';
    const ESTATUS_ENTREVISTADO = 'Entrevistado';
    const ESTATUS_CONTRATADO   = 'Contratado';

    const ESTATUS_TITULO = [
        self::ESTATUS_PENDIENTE     => 'Pendiente',
        self::ESTATUS_ACEPTADO      => 'Aceptado',
        self::ESTATUS_NO_ACEPTADO   => 'No aceptado',
        self::ESTATUS_EVALUADO      => 'Evaluado',
        self::ESTATUS_ENTREVISTADO  => 'Entrevistado',
        self::ESTATUS_CONTRATADO    => 'Contratado',
    ];

    protected $guarded = [];

    public function expedientes() {

        return $this->hasMany(Expediente::class);
    }

    public function evaluacion() {
        return $this->hasOne(Evaluacion::class);
    }

    public function getCalificacionEvaluacionAttribute() {
        return $this->evaluacion?->calificacion_final;
    }

    public function getCalificacionEntrevistaAttribute() {
        return $this->entrevista?->calificacion;
    }


    public function getCalificacionGlobalAttribute() {
        return number_format($this->evaluacion?->calificacion_final_porcentaje + $this->entrevista?->calificacion_final_porcentaje,2);
    }

    public function getUltimoEmpleoAttribute() {
        if (!$this->experiencia_laboral || !is_array($this->experiencia_laboral))
            return null;

        $experiencias = $this->experiencia_laboral;


        if (count($experiencias) == 1)
            return $experiencias[0];

        $experienciasActuales = array_filter($experiencias, fn($item) => $item['actual'] == 1);
        $experienciasActuales = array_values($experienciasActuales);


        if (count($experienciasActuales) > 0)
            return $experienciasActuales[0];


        $fechas = array_column($experiencias, 'fin');
        usort($fechas, function ($a, $b) {
            return strtotime($b) - strtotime($a);
        });
        $ultimaFecha = $fechas[0] ?? null;

        if (!$ultimaFecha)
            return null;

        $experiencias = array_filter($experiencias, fn($item) => $item['fin'] == $ultimaFecha);
        $experiencias = array_values($experiencias);

        if (count($experiencias) > 0)
            return $experiencias[0];

    }

    public function entrevista() {
        return $this->hasOne(Entrevista::class);
    }

    public function getClaveElector($value)
    {
        return strtoupper($value);
    }
}
