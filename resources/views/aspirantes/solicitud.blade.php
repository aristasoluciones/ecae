@extends('adminlte::page')

@section('title', 'Solicitud')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"></i> Solicitud</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-7 col-sm-12">
            @livewire('aspirantes.solicitud', ['aspirante' => $aspirante])
        </div>
        <div class="col-md-5 col-sm-12">
            @livewire('aspirantes.expediente', ['aspirante' => $aspirante])
        </div>
    </div>
@stop




