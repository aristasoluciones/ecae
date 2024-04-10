<div class="d-flex flex-row justify-content-end mb-2">
    <a class="btn btn-primary btn-circle"
       wire:click.prevent="$emitTo('usuarios.formulario','agregar')"
       title="Agregar usuario">
        Agregar <i class="fas fa-plus-circle"></i>
    </a>
</div>

<div id="acordion">
    <div class="card card-pink">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100" href="#filtro" aria-expanded="true" data-toggle="collapse">Filtro de busqueda</a>
            </h4>
        </div>
        <div id="filtro" class="collapse show" data-parent="#">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text"
                                   autocomplete="off"
                                   class="form-control"
                                   wire:model.defer="fNombre"
                                   name="fNombre"
                                   id="fNombre">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Tipo de usuario</label>
                            <select class="form-control"
                                    wire:model.defer="fTipoUsuario"
                                    name="fTipoUsuario"
                                    id="fTipoUsuario">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->roles as $keyRol => $item)
                                    <option value="{{ $keyRol }}">{{ ucfirst($item) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="">Consejo electoral</label>
                            <select class="form-control"
                                    wire:model.defer="fConsejo"
                                    name="fConsejo"
                                    id="fConsejo">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach ($this->consejos as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row justify-content-center">
                    <div class="btn-group-toggle">
                        <button class="btn btn-success" wire:click.prevent="buscar">
                            <span wire:loading.remove wire:target="buscar">Buscar</span>
                            <span wire:loading wire:target="buscar">Buscando información</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



