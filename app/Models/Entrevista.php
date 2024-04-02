<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrevista extends Model
{
    protected $table = 'entrevistas';

    protected $casts = ['competencias' => 'json'];
    protected $guarded = [];

    public function aspirante() {

        return $this->belongsTo(Aspirante::class);
    }
}
