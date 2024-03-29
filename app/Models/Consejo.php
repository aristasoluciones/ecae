<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consejo extends Model
{
    use SoftDeletes;

    protected $table = 'consejos';
    protected $guarded = [];

    public function municipio() {
        return $this->belongsTo(Municipio::class,'cve_mun','cve_mun');
    }

}
