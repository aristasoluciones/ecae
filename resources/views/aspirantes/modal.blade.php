<div id="modal-notificar" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
    <livewire:aspirantes.notificar />
</div>
<div id="modal-evaluacion" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
    <livewire:aspirantes.evaluacion />
</div>

<div id="modal-entrevista" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
    <livewire:aspirantes.entrevista />
</div>
<div id="modal-confirmar-eliminar" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Confirmar eliminar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-justify">
                        <p>Esta seguro de eliminar la información, tenga en cuenta que esta acción es irreversible.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p><strong>Clave de elector : </strong><span class="badge badge-info fs-15">{{ $registroEliminar?->clave_elector }}</span></p>
                        <p><strong>Nombre del aspirante : </strong><span class="badge badge-info fs-15">{{ $registroEliminar?->nombre." ".$registroEliminar?->apellido1." ".$registroEliminar?->apellido2 }}</span></p>
                        <p><strong>Consejo municipal    : </strong><span class="badge badge-info fs-15">{{ $registroEliminar?->sede }}</span></p>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group-toggle" wire:loading.remove wire.target="eliminar">
                    <button type="button"
                            class="btn btn-danger close-btn mr-2"
                            data-dismiss="modal">Cerrar</button>
                    <button type="button"
                            class="btn btn-primary"
                            wire:click="eliminar">Si</button>
                </div>
                <button type="button"
                        class="btn btn-primary"
                        wire:loading wire.target="eliminar">
                    <span >Eliminando información <i class="fas fa-spinner"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
