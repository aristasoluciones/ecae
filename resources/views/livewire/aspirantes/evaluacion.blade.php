<div class="modal-dialog modal-dialog-centered" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">Captura de calificación de <strong> {{ $aspirante?->nombre." ".$aspirante?->apellido1." ".$aspirante?->apellido2 }}</strong></h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="form row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Aciertos obtenidos</label>
                            <div class="input-group">
                                <input class="form-control {{ $errors->has('aciertos') ? 'is-invalid':'' }}"
                                       type="number" wire:model="aciertos"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{$aciertos}} / de {{ config('constants.aciertos_evaluacion') }}</span>
                                </div>
                            </div>
                            @error('aciertos')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Calificación</label>  <span class="d-inline-block badge badge-info fs-15 d-inline-block">{{ $calificacion }}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class=" alert alert-light small">
                            <span class="text-bold">*</span> <sup class="text-bold">1</sup> El aspirante cuenta con discapacidad  <i class="fa {{ $aspirante?->p15_discapacidad === 'Si' ? 'fa-check-circle text-success' : 'fa-times-circle'}} "></i>
                            <span class="badge fs-2 {{ $aspirante?->p15_discapacidad === 'Si' ? 'badge-succes' : 'badge-secondary'}}">
                                {{ $aspirante?->p15_discapacidad === 'Si' ? '+'.$discapacidad.' Punto adicional' : ' +0 Punto adicional'}}
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="alert alert-light small">
                        <span class="text-bold">* </span><sup class="text-bold">2</sup> El aspirante se identifica como persona LGBTTTIQ+  <i class="fa {{ $aspirante?->persona_lgbtttiq === 'Si' ? 'fa-check-circle text-success' : 'fa-times-circle'}} "></i>
                        <span class="badge {{ $aspirante?->persona_lgbtttiq === 'Si' ? 'badge-succes' : 'badge-secondary'}}">
                         {{ $aspirante?->persona_lgbtttiq === 'Si' ? '+'.$lgbtttiq.' Punto adicional' : ' +0 Punto adicional'}}
                        </span>
                    </div>
                </div>
                    <div class="col-12">
                           <div class="form-group">
                               <label for="">Calificación final </label>  <span class="d-inline-block badge {{ $calificacionFinal >= config('constants.calificacion_minima') ? 'badge-success' : 'badge-danger' }} fs-15 d-inline-block">{{ $calificacionFinal }}</span>
                           </div>
                     </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-12">
                    <p class="small text-justify"><span class="text-bold">*</span> Siempre y cuando las personas aspirantes hayan obtenido la calificación mínima aprobatoria de éste, es decir, 6.00 (seis).</p>
                    <p class="small text-justify"><sup class="text-bold">1</sup> Protocolo para la inclusión de Personas con Discapacidad como funcionarios y funcionarias de Mesas Directivas de Casilla y de esta forma se otorgue bajo los mismos criterios en todos los OPL.</p>
                    <p class="small text-justify"><sup class="text-bold">2</sup> Protocolo para adoptar las medidas tendientes a garantizar a las personas trans el ejercicio del voto en igualdad de condiciones y sin discriminación en todos los tipos de elección y mecanismos de participación ciudadana</p>
                </div>
                <div class="col-12 d-flex flex-column flex-md-row justify-content-end">
                    <button type="button" class="btn btn-danger close-btn m-2"
                            wire:loading.remove wire:target="guardar"
                            data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success m-2" wire:click="guardar">
                        <span wire:loading.remove wire:target="guardar">Guardar</span>
                        <span wire:loading wire:target="guardar">Enviando...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
