<div class="flex">
    <div class="btn-group-toggle">
        <button class="btn btn-sm btn-primary btn-circle" title="Editar" wire:click.prevent="$emitTo('usuarios.formulario','editar', {{ $row->id }})">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </button>
    </div>
</div>
