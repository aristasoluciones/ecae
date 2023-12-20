<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">{{ $role?->id > 0 ? 'Actualizar' : 'Nuevo' }} rol</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="card">
                <div class="card-body">
                    <div class="form row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Nombre</label>
                                <input wire:model="name" class="form-control" type="text">
                                @error('name')<span class="text-danger error h6">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Seleccione los permisos de acceso</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @if(count($this->listaPermisos) > 0)
                                @foreach($this->listaPermisos[0] as $primerNivel)
                                    <div class="col-4 col-md-4 col-sm-6">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox"
                                                   class="custom-control-input custom-control-input-success"
                                                   id="{{$primerNivel['name']}}"
                                                   name="{{$primerNivel['name']}}"
                                                   value="{{$primerNivel['fullname']}}"
                                                   wire:model.defer="permisos"
                                            >
                                            <label for="{{$primerNivel['name']}}"
                                                   class="custom-control-label text-bold">{{ $primerNivel['title'] }}</label>
                                        </div>
                                        <ul class="list-unstyled ml-3">
                                            @if(isset($this->listaPermisos[1][$primerNivel['name']]))
                                                @foreach($this->listaPermisos[1][$primerNivel['name']] as $segundoNivel)
                                                    <li class="">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox"
                                                                   class="custom-control-input custom-control-input-success"
                                                                   id="{{ $primerNivel['name']."-".$segundoNivel['name']}}"
                                                                   name="{{$segundoNivel['name']}}"
                                                                   value="{{$segundoNivel['fullname']}}"
                                                                   wire:model.defer="permisos"
                                                            >
                                                            <label for="{{ $primerNivel['name']."-".$segundoNivel['name']}}"
                                                                   class="custom-control-label @isset($this->listaPermisos[2][$segundoNivel['name']]) text-bold @endisset">{{ $segundoNivel['title'] }}</label>
                                                        </div>
                                                    </li>
                                                    @if(isset($this->listaPermisos[2][$segundoNivel['name']]))
                                                        <ul class="list-unstyled ml-3">
                                                            @foreach($this->listaPermisos[2][$segundoNivel['name']] as $tercerNivel)
                                                                <li class="">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                               class="custom-control-input custom-control-input-success"
                                                                               id="{{$primerNivel['name']."-".$segundoNivel['name']."-".$tercerNivel['name']}}"
                                                                               name="{{$tercerNivel['name']}}"
                                                                               value="{{$tercerNivel['fullname']}}"
                                                                               wire:model.defer="permisos"
                                                                        >
                                                                        <label
                                                                            for="{{$primerNivel['name']."-".$segundoNivel['name']."-".$tercerNivel['name']}}"
                                                                            class="custom-control-label">{{ $tercerNivel['title'] }}</label>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" wire:click.prevent=@if($role?->id > 0)"actualizar()"@else
                "guardar()"
            @endif>Guardar</button>
        </div>
    </div>
</div>
