<div class="modal-dialog" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">{{ $user?->id > 0 ? 'Actualizar' : 'Nuevo' }} usuario</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Nombre</label>
                        <input wire:model="name" class="form-control @if($errors->has('name')) is-invalid @endif" type="text"/>
                        @error('name')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>

                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Nombre de usuario o Correo electrónico</label>
                        <input wire:model="email" class="form-control @if($errors->has('email')) is-invalid @endif" type="text" />
                        @error('email')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Contraseña</label>
                        <div class="input-group">
                            <input wire:model="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" type="{{ $viewPassword ? 'text' : 'password'}}">
                            <div class="input-group-append">
                                <span title="Ver" class="input-group-text text-info" wire:click="togglePassword()">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        @error('password')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Confirmar contraseña</label>
                        <div class="input-group">
                            <input wire:model="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation" type="{{ $viewPassword ? 'text' : 'password'}}">
                            <div class="input-group-append">
                                <span title="Ver" class="input-group-text text-info" wire:click="togglePassword()">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        @error('password_confirmation')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Rol</label>
                        <select wire:model="role" class="form-control @if($errors->has('role')) is-invalid @endif">
                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach($roles as $rol)
                                <option value="{{$rol['name']}}">{{ ucfirst($rol['name'])}}</option>
                            @endforeach
                        </select>
                        @error('role')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                @if($role == 'odes')
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> Consejo electoral</label>
                            <select wire:model="sede" class="form-control @if($errors->has('sede')) is-invalid @endif">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach($consejos as $consejo)
                                    <option value="{{ $consejo }}">{{ $consejo }}</option>
                                @endforeach
                            </select>
                            @error('sede')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn"
                    wire:loading.remove wire:target="save"
                    data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" wire:click=save()>
                <span wire:loading.remove wire:target="save">Guardar</span>
                <span wire:loading wire:target="save">Guardando información</span>
            </button>
        </div>
    </div>
</div>
@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('confirmarAcuse', params => {
                Swal.fire({
                    icon:params.icon,
                    title:params.title,
                    html:params.text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:params.confirmText,
                    reverseButtons: true,
                    cancelButtonText: 'No',
                }).then(result => {
                    if (result.value) {
                        @this.call(params.method)
                    }
                    @this.call(params.callback,...params.callback_props)
                })
            })
        })
    </script>
@endsection
