<form onsubmit="return false" class="form-horizontal">
    <div class="form-group row">
        <label for="inputName" class="col-sm-4 col-form-label">Nueva contraseña</label>
        <div class="col-sm-6">
            <div class="input-group">
                <input wire:loading.attr="disabled"
                       wire:target="guardar"
                       wire:model.defer="password"
                       class="form-control
                       @if($errors->has('password')) is-invalid @endif" name="password" type="{{ $viewPassword ? 'text' : 'password'}}">
                <div class="input-group-append">
                    <span type="button" title="Ver" class="input-group-text {{ $viewPassword ? 'text-info' : 'text-gray'}}" wire:click="togglePassword()">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            @error('password')<span class="text-danger error h6">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-4 col-form-label">Confirmar nueva contraseña</label>
        <div class="col-sm-6">
            <div class="input-group">
                <input wire:loading.attr="disabled"
                       wire:model.defer="password_confirmation"
                       wire:target="guardar"
                       class="form-control @if($errors->has('password_confirmation')) is-invalid @endif"
                       name="password_confirmation"
                       type="{{ $viewPassword ? 'text' : 'password'}}">
                <div class="input-group-append">
                    <span type="button" title="Ver" class="input-group-text {{ $viewPassword ? 'text-info' : 'text-gray'}}" wire:click="togglePassword()">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            @error('password_confirmation')<span class="text-danger error h6">{{ $message }}</span>@enderror

        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <button wire:click="handlerGuardar" class="btn btn-success">
                <span wire:loading.remove wire:target="handlerGuardar">Guardar</span>
                <span wire:loading  wire:target="handlerGuardar">Actualizando contraseña</span>
            </button>
        </div>
    </div>

    <div id="modal-logout" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Se ha actualizado la contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-justify">
                            <p>¿Desea cerrar la sesión actual e ingresar con su nueva contraseña ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group-toggle" wire:loading.remove wire:target="logout">
                        <button type="button"
                                class="btn btn-danger close-btn"
                                data-dismiss="modal">No</button>
                        <a type="button"
                           class="btn btn-success"
                           href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Si</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-confirmar" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Confirmar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-justify">
                            <p>¿Esta seguro de actualizar su contraseña ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group-toggle" wire:loading.remove wire:target="guardar">
                        <button type="button"
                                class="btn btn-danger close-btn"
                                data-dismiss="modal">No</button>
                        <button type="button"
                                class="btn btn-success"
                                wire:click="guardar">Si</button>
                    </div>
                    <button type="button"
                            class="btn btn-primary"
                            wire:loading wire.target="guardar">
                        <span >Actualizando contraseña <i class="fas fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</form>
