<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
    use HasFactory;

    protected $casts = ['experiencia_laboral' => 'json'];

    protected $with  = ['evaluacion'];

    const ESTATUS_PENDIENTE   = 'Pendiente';
    const ESTATUS_ACEPTADO    = 'Aceptado';
    const ESTATUS_NO_ACEPTADO = 'No aceptado';

    const ESTATUS_TITULO = [
        self::ESTATUS_PENDIENTE => 'Pendiente',
        self::ESTATUS_ACEPTADO  => 'Aceptado',
        self::ESTATUS_NO_ACEPTADO  => 'No aceptado',
    ];

    protected $guarded = [];

    public function expedientes() {

        return $this->hasMany(Expediente::class);
    }

    public function evaluacion() {
        return $this->hasOne(Evaluacion::class);
    }

    public function getClaveElector($value)
    {
        return strtoupper($value);
    }
}
