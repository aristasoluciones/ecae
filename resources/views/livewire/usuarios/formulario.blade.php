<div class="modal-dialog" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">{{ $user?->id > 0 ? 'Actualizar' : 'Nuevo' }} usuario</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                <div class="col-12 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Nombre</label>
                        @if($fromCandidato == 1)
                            <input wire:model.defer="name" class="form-control" type="text" readonly/>
                        @else
                            <input wire:model="name" class="form-control" type="text"/>
                        @endif
                    </div>

                    @if($fromCandidato == 0)
                        @error('name')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    @endif
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Usuario(Clave de elector / Correo electrónico)</label>
                        @if($fromCandidato == 1)
                            <input wire:model.defer="email" class="form-control" type="text" readonly/>
                        @else
                            <input wire:model="email" class="form-control" type="text" />
                        @endif
                    </div>
                    @if($fromCandidato == 0)
                        @error('email')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    @endif
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Contraseña</label>
                        <div class="input-group">
                            <input wire:model="password" class="form-control" name="password" type="{{ $viewPassword ? 'text' : 'password'}}">
                            <div class="input-group-append">
                                <span title="Ver" class="input-group-text text-info" wire:click="togglePassword()">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    @error('password')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Confirmar contraseña</label>
                        <div class="input-group">
                            <input wire:model="password_confirmation" class="form-control" name="password_confirmation" type="{{ $viewPassword ? 'text' : 'password'}}">
                            <div class="input-group-append">
                                <span title="Ver" class="input-group-text text-info" wire:click="togglePassword()">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                    @error('password_confirmation')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                @if($fromCandidato == 0)
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> Rol</label>
                            <select wire:model="role" class="form-control">
                                <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{$role['name']}}">{{ ucfirst($role['name'])}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" wire:click=save()>Guardar</button>
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
