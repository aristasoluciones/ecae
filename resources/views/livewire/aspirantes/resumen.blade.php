<div class="small-box bg-{{$theme}}">
    <div class="inner">
        <h3>{{ number_format($total)  }}</h3>
        <p>{{ !$estatus ? 'Total de aspirantes registrados' : 'Aspirantes en estatus '.$estatus }}</p>
    </div>
    <div class="icon">
        <i class="fa fa-users"></i>
    </div>
</div>
