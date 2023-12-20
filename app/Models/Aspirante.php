<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
    use HasFactory;

    protected $casts = ['experiencia_laboral' => 'json'];

    const ESTATUS_PENDIENTE = 'Pendiente';
    const ESTATUS_ACEPTADO  = 'Aceptado';

    const ESTATUS_TITULO = [
        self::ESTATUS_PENDIENTE => 'Pendiente',
        self::ESTATUS_ACEPTADO  => 'Aceptado',
    ];

    protected $guarded = [];

    public function expedientes() {

        return $this->hasMany(Expediente::class);
    }

}
