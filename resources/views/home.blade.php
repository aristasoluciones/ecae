@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="warning" estatus="En captura"/>
        </div>
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="danger" estatus="Observados"/>
        </div>
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="primary" estatus="Validados"/>
        </div>
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="success" estatus="Publicados"/>
        </div>
    </div>
@stop
