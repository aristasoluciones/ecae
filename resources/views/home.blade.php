@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fa fa-chart-pie"></i>Dashboard</h1>
@stop

@section('content')
    @livewire('dashboard.inicio')
@stop
