<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expediente extends Model
{
    use SoftDeletes;

    protected $table = 'expedientes';

    public $with = ['documento'];

    protected $guarded = [];

    public function documento() {

        return $this->belongsTo(Documento::class);
    }

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }
}
