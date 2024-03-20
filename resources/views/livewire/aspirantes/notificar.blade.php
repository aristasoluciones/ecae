<div class="modal-dialog" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">Enviar comunicado</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Asunto</label>
                        <input wire:model="asunto" class="form-control @if($errors->has('asunto')) is-invalid @endif" type="text"/>
                        @error('asunto')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>

                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Mensaje</label>
                        <textarea wire:model="mensaje"
                                  class="form-control
                                  @if($errors->has('mensaje')) is-invalid @endif"></textarea>
                        @error('mensaje')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Se enviaran a los siguientes correos electrónicos</label>
                        <p>
                            @if($todos)
                                <span class="badge badge-primary">A los <strong>{{count($destinatarios ?? 0)}}</strong> aspirantes registrados </span>
                            @else
                                @foreach($destinatarios ?? [] as $destinatario)
                                    <span class="badge badge-primary">{{ mb_strtoupper($destinatario['nombre']." ".$destinatario['apellido1']." ".$destinatario['apellido2']."(". $destinatario['email'].")") }}</span>
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn"
                    wire:loading.remove wire:target="enviar"
                    data-dismiss="modal">Cancelar</button>
            <button class="btn btn-success" wire:click="enviar">
                <span wire:loading.remove wire:target="enviar">Confirmar y enviar</span>
                <span wire:loading wire:target="enviar">Enviando...</span>
            </button>
        </div>
    </div>
</div>
