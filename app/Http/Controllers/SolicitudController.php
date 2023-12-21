<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;

class SolicitudController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Aspirante $aspirante)
    {
        return view('aspirantes.solicitud', ['aspirante' => $aspirante]);
    }

}
