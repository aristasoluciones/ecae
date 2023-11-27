<?php

namespace App\Http\Controllers;

class RoleController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('roles.index');
    }

}
