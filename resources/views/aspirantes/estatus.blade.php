@php
    $colorBadge = 'badge-success';
    $estatus = \App\Models\Aspirante::ESTATUS_TITULO[$row->estatus];
    switch ($row->estatus) {
        case \App\Models\Aspirante::ESTATUS_PENDIENTE:    $colorBadge = 'badge-secondary'; break;
        case \App\Models\Aspirante::ESTATUS_ACEPTADO:     $colorBadge = 'badge-success'; break;
        case \App\Models\Aspirante::ESTATUS_NO_ACEPTADO:  $colorBadge = 'badge-danger'; break;
        default: $colorBadge = 'badge-secondary'; break;
    }
@endphp
<div class="badge badge-btn {{$colorBadge}} text-center">
  <span class="text-bold">{{ $estatus }}</span>
</div>
