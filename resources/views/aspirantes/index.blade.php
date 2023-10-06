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
    @role('candidato')
        <h3>Soy un representante</h3>
    @else
        @livewire('aspirantes.inicio')
        <div id="modal-user" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
             data-keyboard="false">
            <livewire:usuarios.formulario fromCandidato="1" />
        </div>
    @endrole

@stop


