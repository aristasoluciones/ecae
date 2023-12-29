
<div class="badge badge-btn bg-gradient-gray-dark">
    <span class="text-bold">{{ strtoupper($row->roles[0]['name']) }}</span>
</div>
@if($row->hasRole('odes'))
    <div class="badge badge-btn bg-gradient-indigo">
        <strong>SEDE: </strong><span>{{ $row->sede }}</span>
    </div>
@endif
