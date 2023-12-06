<div class="flex">
    <div class="btn-group btn-group-sm">
        <!--button class="btn btn-primary btn-circle " title="Editar" wire:click="editar({{ $attributes['id'] }})">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </button-->
        <a href='{{ url("candidatura/{$attributes['id']}") }}' class="btn btn-primary " title="Editar">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
        <button class="btn btn-success btn-circle" wire:click="$emitTo('usuarios.formulario', 'crearUsuarioCandidato',{{ $attributes['id'] }} )" title="Generar usuario">
            <i class="fas fa-user" aria-hidden="true"></i>
        </button>
        <button class="btn btn-warning btn-circle text-white" wire:click="generarFicha({{ $attributes['id'] }} )" title="Generar solicitud a pdf">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </button>
    </div>
</div>
