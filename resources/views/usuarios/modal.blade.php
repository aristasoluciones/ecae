<div id="modal-user" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
    <livewire:usuarios.formulario />
</div>

<div id="modal-estatus" class="modal fade" role="dialog" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar acción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-justify">
                        <p>Esta seguro de realizar esta acción</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group-toggle" wire:loading.remove>
                        <button type="button"
                                class="btn btn-danger close-btn mr-2"
                                data-dismiss="modal">No
                        </button>
                        <button type="button"
                                class="btn btn-primary"
                                wire:click="toggleEstatus">Si
                        </button>
                    </div>
                    <button type="button"
                            class="btn btn-primary"
                            wire:loading wire.target="toggleEstatus">
                        <span>Eliminando información <i class="fas fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
