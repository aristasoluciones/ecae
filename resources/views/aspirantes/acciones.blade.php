<div class="flex justify-content-between">
    <div class="btn-group-toggle btn-group-sm">
        <a href='{{ url("solicitud/" . $row->id) }}' class="btn btn-primary " title="Ver solicitud">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
        <a class="btn btn-warning btn-circle text-white" wire:click="generarFicha({{ $row->id }})" title="Generar solicitud a pdf">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </a>
    </div>
</div>
