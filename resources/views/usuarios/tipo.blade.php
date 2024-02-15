
@php
    $explodeNombre =  explode('_', $row->roles[0]['name'] ?? '');
    $nombre = implode(' ', $explodeNombre);
@endphp
<div class="badge badge-btn bg-gradient-gray-dark">
    <span class="text-bold">{{ strtoupper($nombre) }}</span>
</div>
@if($row->hasRole('odes'))
    <div class="badge badge-btn bg-gradient-indigo">
        <strong>SEDE: </strong><span>{{ $row->sede }}</span>
    </div>
@endif
