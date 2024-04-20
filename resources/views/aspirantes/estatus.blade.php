@php
    $colorBadge = 'badge-success';
    $estatusTitle = \App\Models\Aspirante::ESTATUS_TITULO[$row->estatus];
    $estatus = $row->estatus;

    if ($row->evaluacion && $row->estatus === \App\Models\Aspirante::ESTATUS_ACEPTADO) {
        $estatusTitle = \App\Models\Aspirante::ESTATUS_TITULO[\App\Models\Aspirante::ESTATUS_EVALUADO];
        $estatus      = \App\Models\Aspirante::ESTATUS_EVALUADO;
    }

    if ($row->entrevista && $row->estatus === \App\Models\Aspirante::ESTATUS_ACEPTADO) {
        $estatusTitle = \App\Models\Aspirante::ESTATUS_TITULO[\App\Models\Aspirante::ESTATUS_ENTREVISTADO];
        $estatus      = \App\Models\Aspirante::ESTATUS_ENTREVISTADO;
    }

    if ($row->contrato && $row->estatus === \App\Models\Aspirante::ESTATUS_ACEPTADO) {
        $estatusTitle = \App\Models\Aspirante::ESTATUS_TITULO[\App\Models\Aspirante::ESTATUS_CONTRATADO];
        $estatus      = \App\Models\Aspirante::ESTATUS_CONTRATADO;
    }

    switch ($estatus) {
        case \App\Models\Aspirante::ESTATUS_PENDIENTE:    $colorBadge = 'badge-secondary'; break;
        case \App\Models\Aspirante::ESTATUS_ACEPTADO:
        case \App\Models\Aspirante::ESTATUS_EVALUADO:
        case \App\Models\Aspirante::ESTATUS_CONTRATADO:
        case \App\Models\Aspirante::ESTATUS_ENTREVISTADO: $colorBadge = 'badge-success'; break;
        case \App\Models\Aspirante::ESTATUS_NO_ACEPTADO:  $colorBadge = 'badge-danger'; break;
        default: $colorBadge = 'badge-secondary'; break;
    }
@endphp
<div class="d-flex flex-column justify-content-start">
    <div class="badge badge-btn {{$colorBadge}} text-center m-1">
        <span class="text-bold">{{ $estatusTitle }}</span>
    </div>
</div>
