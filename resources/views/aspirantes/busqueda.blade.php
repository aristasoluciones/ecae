<div class="d-flex flex-column flex-md-row justify-content-between justify-content-md-end mb-2">
    <a class="btn btn-{{$theme}} {{$class}} m-1"
       @isset($route) href="{{ route($route) }}" target="_blank" @endisset
       @isset($evento) wire:click="{{$evento}}" @endisset
       title="{{$title}}">
        @isset($icon) <i class="{{ $icon }}"></i> @endisset @isset($label) {{ $label }} @endisset

    </a>
</div>

<div id="acordion" wire:ignore>
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100" href="#filtro" aria-expanded="true" data-toggle="collapse">Filtro de busqueda</a>
            </h4>
        </div>
        <form action="#" name="frm-busqueda-aspirante" onsubmit="return false">
            <div id="filtro" class="collapse show" data-parent="#acordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Folio</label>
                            <input type="number" class="form-control"
                                    wire:model.defer="fFolio"
                                    name="fFolio"
                                    id="fFolio">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"
                                   autocomplete="off"
                                   wire:model.defer="fNombre"
                                   name="fNombre"
                                   id="fNombre">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Municipio</label>
                            <select class="form-control"
                                    wire:model.defer="fMunicipio"
                                    name="fMunicipio"
                                    id="fMunicipio">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->municipios as $municipio)
                                    <option value="{{ $municipio->municipio }}">{{ $municipio->municipio }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">SEDE</label>
                            <select class="form-control"
                                    wire:model.defer="fSede"
                                    name="fSede"
                                    id="fSede">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->sedes as $sede)
                                    <option value="{{ $sede->sede }}">{{ $sede->sede }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Edad</label>
                            <select class="form-control"
                                    wire:model.defer="fEdad"
                                    name="fEdad"
                                    id="fEdad">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->edades as $edad)
                                    <option value="{{ $edad->edad }}">{{ $edad->edad }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Género</label>
                            <select class="form-control"
                                    wire:model.defer="fGenero"
                                    name="fGenero"
                                    id="fGenero">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->generos as $genero)
                                    <option value="{{ $genero->genero }}">{{ $genero->genero }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Estatus</label>
                            <select class="form-control"
                                    wire:model.defer="fEstatus"
                                    name="fEstatus"
                                    id="fEstatus">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach(\App\Models\Aspirante::ESTATUS_TITULO as $ktitulo => $estatusTitulo)
                                    <option value="{{ $ktitulo }}">{{ $estatusTitulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @hasanyrole('superadministrador')
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="">Periodo</label>
                            <input class="form-control" type="text" readonly name="filtro-periodo" id="filtro-periodo">
                        </div>
                    </div>
                    @endhasanyrole
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-sm-start justify-content-md-center">
                        <button class="btn btn-success mx-1 my-1" wire:click="getRows">
                            <span wire:loading.remove wire:target="getRows">Buscar</span>
                            <span wire:loading wire:target="getRows">Buscando información</span>
                        </button>
                        <button class="btn btn-info mx-1 my-1" wire:click="exportar">
                            <span wire:loading.remove wire:target="exportar"><i class="fa fa-file-excel"></i> Exportar aspirantes</span>
                            <span wire:loading wire:target="exportar">Generando archivo</span>
                        </button>

                        <button class="btn bg-gradient-navy  mx-1 my-1" wire:click="exportarEvaluados">
                            <span wire:loading.remove wire:target="exportarEvaluados"><i class="fa fa-file-pdf"></i> Exportar evaluados</span>
                            <span wire:loading wire:target="exportarEvaluados">Generando archivo</span>
                        </button>
                        <button class="btn bg-gradient-indigo mx-1 my-1" wire:click="exportarEntrevistados">
                            <span wire:loading.remove wire:target="exportarEntrevistados"><i class="fa fa-file-pdf"></i> Exportar entrevistados</span>
                            <span wire:loading wire:target="exportarEntrevistados">Generando archivo</span>
                        </button>
                        <button class="btn bg-gradient-indigo mx-1 my-1" wire:click="exportarEntrevistadosExcel">
                            <span wire:loading.remove wire:target="exportarEntrevistadosExcel"><i class="fa fa-file-excel"></i> Exportar entrevistados a excel</span>
                            <span wire:loading wire:target="exportarEntrevistadosExcel">Generando archivo</span>
                        </button>
                        <button class="btn bg-gradient-gray-dark mx-1 my-1" wire:click="exportarResultadosFinales">
                            <span wire:loading.remove wire:target="exportarResultadosFinales"><i class="fa fa-file-pdf"></i> Exportar resultados finales</span>
                            <span wire:loading wire:target="exportarResultadosFinales">Generando archivo</span>
                        </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        let elemento = document.getElementById('filtro-periodo');
        $(elemento).daterangepicker({
            linkedCalendars: false,
            autoApply: false,
            autoUpdateInput: false,
            showDropdowns: true,
            placeholder:'Seleccione un periodo',
            locale: {
                format:'YYYY-MM-DD',
                cancelLabel: 'Limpiar',
                applyLabel: 'Aceptar',
                daysOfWeek: [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mir",
                    "Jue",
                    "Vie",
                    "Sab"
                ],
                monthNames: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
            }
        })
        $(elemento).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') +' al '+picker.endDate.format('YYYY-MM-DD'));
            @this.set('fPeriodo', picker.startDate.format('YYYY-MM-DD') +' al '+picker.endDate.format('YYYY-MM-DD'));
        });
        $(elemento).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val(null);
            @this.set('fPeriodo', null);
        });
    </script>
@endsection



