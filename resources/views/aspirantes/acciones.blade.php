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
    @if($row->estatus === \App\Models\Aspirante::ESTATUS_ACEPTADO)
        @if(auth()->user()->can('aspirantes.evaluar'))
            <a class="btn bg-gradient-navy text-white m-1" wire:click="openCapturaEvaluacion({{ $row->id }})" title="Capturar resultado de evaluación">
                <i class="fas fa-poll-h" aria-hidden="true"></i>
            </a>
        @endif
        <a class="btn bg-gradient-navy text-white m-1" wire:click="openCapturaEntrevista({{ $row->id }})" title="Capturar entrevista">
            <i class="fas fa-user-tag" aria-hidden="true"></i>
        </a>
        @if($row->documentacion && auth()->user()->can('aspirantes.descargar_evidencia'))
            <a class="btn bg-gradient-gray text-white m-1" wire:click="descargarEvidencia({{ $row->id }})" title="Descargar evidencia escaneada">
                <i class="fas fa-file-archive" aria-hidden="true"></i>
            </a>
        @endif
    @endif
    @hasanyrole('superadministrador')
        <a class="btn bg-gradient-indigo text-white m-1" wire:click="generarAcuseSel({{ $row->id }})" title="Generar acuse SEL">
            <i class="fas fa-file-invoice" aria-hidden="true"></i>
        </a>
        <a class="btn bg-gradient-blue text-white m-1" wire:click="generarAcuseCael({{ $row->id }})" title="Generar acuse CAEL">
            <i class="fas fa-file-invoice" aria-hidden="true"></i>
        </a>
    @endhasanyrole


</div>
