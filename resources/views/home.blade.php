@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="success" estatus="{{ \App\Models\Aspirante::ESTATUS_ACEPTADO }}"/>
        </div>
        <div class="col-lg.3 col-md-4 col-sm-12">
            <livewire:aspirantes.resumen theme="danger" estatus="{{ \App\Models\Aspirante::ESTATUS_PENDIENTE }}"/>
        </div>
    </div>
@stop
