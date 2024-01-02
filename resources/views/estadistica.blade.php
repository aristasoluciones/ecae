@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1 class="m-0 text-dark">Graficas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-pink card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a href="#tab-by-genero"
                               id="by-genero"
                               role="tab"
                               aria-controls="by-genero"
                               aria-selected="true"
                               data-toggle="pill"
                               class="nav-link active">Por grado de estudio y genero</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-by-edad"
                               id="by-edad"
                               role="tab"
                               aria-controls="by-edad"
                               aria-selected="true"
                               data-toggle="pill"
                               class="nav-link">Por edad</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-by-municipio"
                               id="by-edad"
                               role="tab"
                               aria-controls="by-municipio"
                               aria-selected="true"
                               data-toggle="pill"
                               class="nav-link">Por municipio</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="estadistica-tab-content">
                        <div class="tab-pane fade show active" id="tab-by-genero" role="tabpanel" aria-labelledby="tab-by-genero-t">
                            <div class="overlay-wrapper">
                                @livewire('charts.genero')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-by-edad" role="tabpanel" aria-labelledby="tab-by-edad-t">
                            <div class="overlay-wrapper">
                                @livewire('charts.edad')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-by-municipio" role="tabpanel" aria-labelledby="tab-by-municipio-t">
                            <div class="overlay-wrapper">
                                @livewire('charts.municipio')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
