<div class="flex">
    <div class="btn-group btn-group-sm">
        <a href='{{ url("solicitud/" . $row->id) }}' class="btn btn-primary " title="Ver solicitud">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
        <button class="btn btn-warning btn-circle text-white" wire:click="generarFicha({{ $row->id }} )" title="Generar solicitud a pdf">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </button>
    </div>
</div>
