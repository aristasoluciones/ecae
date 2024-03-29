<div class="small-box bg-{{$theme}}">
    <div class="inner">
        <h5 class="text-bold">No. de Personas {{ $figura }} a contratar <span class="badge bg-gradient-indigo fs-15">{{ number_format($numProyectados) }}</span></h5>
        <div class="dropdown-divider"></div>
        <div class="d-flex flex-column justify-content-between">
            <p class="text-bold">Contratados <span class="badge bg-gradient-indigo fs-15">{{ number_format($numContratados) }}</span></p>
            <p class="text-bold">Por contratar <span class="badge bg-gradient-indigo fs-15">{{ number_format($numProyectados - $numContratados) }}</span></p>
        </div>
        <p class="text-bold"><span class="badge bg-gradient-lime text-bold fs-15"> {{ $avance }} %</span> de avance de un <span class="badge bg-gradient-green text-bold fs-15"> 100 %</span></p>
        <div class="progress">
            <div class="progress-bar bg-gradient-green progress-bar-striped"
                 role="progressbar"
                 aria-valuenow="20"
                 aria-valuemax="100"
                 style="width: {{ $avance }}%"
                 aria-valuemin="0">
            </div>

        </div>
    </div>
    <div class="icon">
        <i class="fa fa-poll"></i>
    </div>
</div>
