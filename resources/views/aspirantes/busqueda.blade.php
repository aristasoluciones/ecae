<div id="acordion" wire:ignore>
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100" href="#filtro" aria-expanded="true" data-toggle="collapse">Filtro de busqueda</a>
            </h4>
        </div>
        <div id="filtro" class="collapse" data-parent="#acordion">
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
                                @foreach ($this->estatuses as $estatus)
                                    <option value="{{ $estatus->estatus }}">{{ $estatus->estatus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <div class="btn-group-toggle">
                        <button class="btn btn-success" wire:click="getRows">
                            <span wire:loading.remove wire:target="getRows">Buscar</span>
                            <span wire:loading wire:target="getRows">Buscando información</span>
                        </button>
                        <button class="btn btn-info" wire:click="exportar">
                            <span wire:loading.remove wire:target="exportar">Exportar a excel</span>
                            <span wire:loading wire:target="exportar">Generando archivo</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-row {{$position}} mb-2">
    <a class="btn btn-{{$theme}} {{$class}}"
       @isset($route) href="{{ route($route) }}" @endisset
       @isset($evento) wire:click="{{$evento}}" @endisset
       title="{{$title}}">
        @isset($label) {{ $label }} @endisset
        @isset($icon) <i class="{{ $icon }}"></i> @endisset
    </a>
</div>



