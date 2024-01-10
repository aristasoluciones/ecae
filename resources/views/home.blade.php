@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fa fa-chart-pie"></i>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <livewire:aspirantes.resumen theme="success" estatus="{{ \App\Models\Aspirante::ESTATUS_ACEPTADO }}"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <livewire:aspirantes.resumen theme="warning" estatus="{{ \App\Models\Aspirante::ESTATUS_PENDIENTE }}"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <livewire:aspirantes.resumen theme="danger" estatus="{{ \App\Models\Aspirante::ESTATUS_NO_ACEPTADO }}"/>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="overlay-wrapper">
                        @livewire('charts.genero')
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="overlay-wrapper">
                        @livewire('charts.edad')
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="overlay-wrapper">
                        @livewire('charts.municipio')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
