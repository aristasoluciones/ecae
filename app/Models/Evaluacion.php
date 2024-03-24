<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $guarded = [];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }
}
