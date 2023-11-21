@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('classes_body', 'register-page layout-boxed')

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Preloader Animation --}}
        @if($layoutHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Content Wrapper --}}

        @include('adminlte::partials.cwrapper.cwrapper-public')


        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/utileria.js') }}"></script>
@stop
