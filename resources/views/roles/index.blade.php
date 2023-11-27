@extends('adminlte::page')

@section('title', 'Roles de usuario')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"></i> Roles</h1>
        </div>
    </div>
@stop

@section('content')
    @livewire('roles.lista')
@stop


