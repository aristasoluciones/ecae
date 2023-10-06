<div class="modal-dialog" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">{{ $role?->id > 0 ? 'Actualizar' : 'Nuevo' }} rol</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                <div class="col-12 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Nombre</label>
                    </div>
                    <input wire:model="name" class="form-control" type="text">
                    @error('name')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>

                <div class="col-12 col-sm-12 mt-4">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-bold">Acceso a</h4>
                        </div>
                    </div>
                    <div class="row">
                       @if(count($this->listaPermisos) > 0)
                           @foreach($this->listaPermisos[0] as $primerNivel)
                                <div class="col-4 col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                               id="{{$primerNivel['name']}}"
                                               name="{{$primerNivel['name']}}"
                                               value="{{$primerNivel['fullname']}}"
                                               wire:model.defer="permisos"
                                        >
                                        <label class="form-check-label text-bold">{{ $primerNivel['title'] }}</label>
                                    </div>
                                    <ul class="list-unstyled ml-3">
                                        @if(isset($this->listaPermisos[1][$primerNivel['name']]))
                                            @foreach($this->listaPermisos[1][$primerNivel['name']] as $segundoNivel)
                                                <li>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                   id="{{$segundoNivel['name']}}"
                                                                   name="{{$segundoNivel['name']}}"
                                                                   value="{{$segundoNivel['fullname']}}"
                                                                   wire:model.defer="permisos"
                                                            >
                                                            <label class="form-check-label @isset($this->listaPermisos[2][$segundoNivel['name']]) text-bold @endisset">{{ $segundoNivel['title'] }}</label>
                                                        </div>
                                                    </li>
                                                @if(isset($this->listaPermisos[2][$segundoNivel['name']]))
                                                    <ul class="list-unstyled ml-3">
                                                    @foreach($this->listaPermisos[2][$segundoNivel['name']] as $tercerNivel)
                                                        <li>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                       id="{{$segundoNivel['name']}}"
                                                                       name="{{$segundoNivel['name']}}"
                                                                       value="{{$segundoNivel['fullname']}}"
                                                                       wire:model.defer="permisos"
                                                                >
                                                                <label class="form-check-label">{{ $tercerNivel['title'] }}</label>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" wire:click.prevent=@if($role?->id > 0)"actualizar()"@else"guardar()"@endif>Guardar</button>
        </div>
    </div>
</div>
