<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function expedientes() {

        return $this->hasMany(Expediente::class);
    }

}
