<div class="btn-group-toggle btn-group-sm">
    <a href='{{ url("solicitud/" . $row->id) }}' class="btn btn-primary m-1" title="Ver solicitud">
        <i class="fas fa-edit" aria-hidden="true"></i>
    </a>
    <a class="btn btn-warning text-white m-1" wire:click="generarFicha({{ $row->id }})" title="Generar solicitud a pdf">
        <i class="fas fa-file-pdf" aria-hidden="true"></i>
    </a>
    @if($row->email)
        <a class="btn btn-info text-white m-1" wire:click="enviarAcuses({{ $row->id }})" title="Enviar acuses">
            <i class="fas fa-envelope" aria-hidden="true"></i>
        </a>
    @endif
    @if($row->estatus === \App\Models\Aspirante::ESTATUS_ACEPTADO && auth()->user()->can('aspirantes.evaluar'))
        <a class="btn bg-gradient-navy text-white m-1" wire:click="openCapturaEvaluacion({{ $row->id }})" title="Capturar resultado de evaluación">
            <i class="fas fa-poll-h" aria-hidden="true"></i>
        </a>
        @if($row->documentacion && auth()->user()->can('aspirantes.descargar_evidencia'))
            <a class="btn bg-gradient-gray text-white m-1" wire:click="descargarEvidencia({{ $row->id }})" title="Descargar evidencia escaneada">
                <i class="fas fa-file-archive" aria-hidden="true"></i>
            </a>
        @endif
    @endif


</div>
