<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes;

    protected $table = 'municipios';
    protected $guarded = [];

    public function consejos() {
        return $this->hasMany(Municipio::class,'cve_mun','cve_mun');
    }

}
