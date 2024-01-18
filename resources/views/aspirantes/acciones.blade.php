<div class="flex justify-content-between">
    <div class="btn-group-toggle btn-group-sm">
        <a href='{{ url("solicitud/" . $row->id) }}' class="btn btn-primary " title="Ver solicitud">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
        <a class="btn btn-warning btn-circle text-white" wire:click="generarFicha({{ $row->id }})" title="Generar solicitud a pdf">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </a>
        @if($row->email)
            <a class="btn btn-info btn-circle text-white" wire:click="enviarAcuses({{ $row->id }})" title="Enviar acuses">
                <i class="fas fa-envelope" aria-hidden="true"></i>
            </a>
        @endif
    </div>
</div>
