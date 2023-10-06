<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
    use HasFactory;

    protected $casts = ['medios_contacto' => 'json', 'otra_formacion' => 'json'];

    protected $guarded = [];
}
