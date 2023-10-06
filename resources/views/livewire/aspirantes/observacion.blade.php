<div class="modal-dialog modal-dialog-centered" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">Observación</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                <p>{{$candidato?->nombre}}</p>
                <p>{{$candidato?->apelido1}}</p>
                <p>{{$candidato?->apellido2}}</p>
                <p>{{$campo}}</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" wire:click="guardar()">Guardar</button>
        </div>
    </div>
</div>
