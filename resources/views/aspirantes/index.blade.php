@extends('adminlte::page')

@section('title', 'Aspirantes')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"></i> Aspirantes</h1>
        </div>
    </div>
@stop

@section('content')
    @livewire('aspirantes.lista')
@stop


