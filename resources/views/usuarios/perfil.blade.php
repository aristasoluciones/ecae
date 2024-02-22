@extends('adminlte::page')

@section('title', 'Perfil de usuario')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"></i> Perfil de usuario</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                @livewire('usuarios.datos-perfil')
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card card-iepc-outline">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active bg-pink" href="#cambiar-pass" data-toggle="tab">Cambiar contraseña</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="cambiar-pass">
                                @livewire('usuarios.cambiar-password')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


