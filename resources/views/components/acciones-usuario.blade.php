<div class="flex">
    <div class="btn-group btn-group-sm">
        <button class="btn btn-primary btn-circle " title="Editar" wire:click.prevent="$emitTo('usuarios.formulario','editar', {{ $attributes['id'] }})">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </button>
        <button class="btn btn-danger btn-circle" title="Eliminar" data-placement="top" title="Eliminar">
            <i class="fas fa-trash" aria-hidden="true"></i>
        </button>
        <button class="btn btn-success btn-circle"  title="Enviar cuenta de acceso">
            <i class="fas fa-envelope" aria-hidden="true"></i>
        </button>
    </div>

</div>
