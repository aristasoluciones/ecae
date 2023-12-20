@php
    $colorBadge = 'badge-success';
    $estatus = \App\Models\Aspirante::ESTATUS_TITULO[$row->estatus];

    if($row->estatus === 'Pendiente') {
        $colorBadge  = 'badge-secondary';
    }

    elseif($row->estatus === 'Aceptado') {
        $colorBadge = 'badge-success';

    } else $colorBadge = 'badge-secondary';
@endphp
<div class="badge badge-btn {{$colorBadge}} text-center">
  <span class="text-bold">{{ $estatus }}</span>
</div>
