<div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="height: 80%;">
    <div class="modal-content" style="max-height: 100% !important;">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-uppercase">Registrar entrevista</h5>
        </div>
        <div class="modal-body" style="overflow: hidden; overflow-y: auto; display:block">
            <div class="row">
                <div class="col-12">
                    <p><strong>Nombre del aspirante : </strong><span class="badge badge-info fs-15">{{ $aspirante?->nombre." ".$aspirante?->apellido1." ".$aspirante?->apellido2 }}</span></p>
                    <p><strong>Consejo municipal    : </strong><span class="badge badge-info fs-15">{{ $aspirante?->sede }}</span></p>
                </div>
            </div>

            <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="" class="font-weight-normal"><span class="text-danger">* </span>¿Cuál es el motivo por el que quiere participar?</label>
                                            <textarea class="form-control w-75 {{ $errors->has('motivo_participar') ? 'is-invalid' :'' }}"
                                                   wire:model="motivo_participar"></textarea>
                                            @error('motivo_participar')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td><span class="text-danger">* </span>¿Habla alguna lengua indigena? @error('habla_indigena')<small class="text-danger">{{ $message }}</small>@enderror</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="SI"
                                                   wire:model="habla_indigena"
                                                   id="habla_indigena_si"
                                                   name="habla_indigena_si"/>
                                            <label for="habla_indigena_si" class="form-check-label">SI</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="NO"
                                                   wire:model="habla_indigena"
                                                   id="habla_indigena_no"
                                                   name="habla_indigena_no"/>
                                            <label for="habla_indigena_no" class="form-check-label">NO</label>
                                        </div>
                                    </td>
                                </tr>
                                @if($habla_indigena === 'SI')
                                    <tr>
                                        <td colspan="3"><span class="text-danger">* </span> Especifique :
                                            <input type="text"
                                                   class="form-control w-50 {{ $errors->has('cual_lengua_indigena') ? 'is-invalid' :'' }}"
                                                   wire:model="cual_lengua_indigena">
                                            @error('cual_lengua_indigena')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><span class="text-danger">* </span>¿Tiene disponibilidad para trabajar de lunes a domingo, días festivos y en horarios fuera de lo habitual? @error('disponibilidad')<small class="text-danger">{{ $message }}</small>@enderror</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="SI"
                                                   wire:model="disponibilidad"
                                                   id="disponibilidad_si"
                                                   name="disponibilidad_si"/>
                                            <label for="disponibilidad_si" class="form-check-label">SI</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="NO"
                                                   wire:model="disponibilidad"
                                                   id="disponibilidad_no"
                                                   name="disponibilidad_no"/>
                                            <label for="disponibilidad_no" class="form-check-label">NO</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="text-danger">* </span>¿Podrías realizar trabajos de campo, visitas de casa en casa, recorrer distancias largas entre otras actividades de acuerdo al perfil requerido? @error('trabajo_campo')<small class="text-danger">{{ $message }}</small>@enderror</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="SI"
                                                   wire:model="trabajo_campo"
                                                   id="trabajo_campo_si"
                                                   name="trabajo_campo_si"/>
                                            <label for="trabajo_campo_si" class="form-check-label">SI</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="NO"
                                                   wire:model="trabajo_campo"
                                                   id="trabajo_campo_no"
                                                   name="trabajo_campo_no"/>
                                            <label for="trabajo_campo_no" class="form-check-label">NO</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="text-danger">* </span>¿Has participado en algún proceso electoral? @error('participo_pe')<small class="text-danger">{{ $message }}</small>@enderror</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="SI"
                                                   wire:model="participo_pe"
                                                   id="participo_pe_si"
                                                   name="participo_pe_si"/>
                                            <label for="participo_pe_si" class="form-check-label">SI</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="NO"
                                                   wire:model="participo_pe"
                                                   id="participo_pe_no"
                                                   name="participo_pe_no"/>
                                            <label for="participo_pe_no" class="form-check-label">NO</label>
                                        </div>
                                    </td>
                                </tr>
                                @if($participo_pe === 'SI')
                                    <tr>
                                        <td colspan="3"><span class="text-danger">* </span>En caso de responder SI, que cargo, tiempo y donde ¿especifique?
                                            <input type="text"
                                                   class="form-control w-50 {{ $errors->has('cargo_tiempo_donde_pe') ? 'is-invalid' :'' }}"
                                                   wire:model="cargo_tiempo_donde_pe">
                                            @error('cargo_tiempo_donde_pe')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><span class="text-danger">* </span> ¿Has colaborado con algún partido político, organizaciones civiles? @error('colaborado_pp_oc')<small class="text-danger">{{ $message }}</small>@enderror</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="SI"
                                                   wire:model="colaborado_pp_oc"
                                                   id="colaborado_pp_oc_si"
                                                   name="colaborado_pp_oc_si"/>
                                            <label for="colaborado_pp_oc_si" class="form-check-label">SI</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="NO"
                                                   wire:model="colaborado_pp_oc"
                                                   id="colaborado_pp_oc_no"
                                                   name="colaborado_pp_oc_no"/>
                                            <label for="colaborado_pp_oc_no" class="form-check-label">NO</label>
                                        </div>
                                    </td>
                                </tr>
                                @if($colaborado_pp_oc === 'SI')
                                    <tr>
                                        <td colspan="3"><span class="text-danger">* </span>En caso de responder SI, que cargo, tiempo y donde ¿especifique?<br>
                                            <input type="text"
                                                   class="form-control w-50 {{ $errors->has('cargo_tiempo_donde_pe') ? 'is-invalid' :'' }}"
                                                   wire:model="cargo_tiempo_donde_pp_oc">
                                            @error('cargo_tiempo_donde_pp_oc')
                                            <small>{{ $message }}</small>
                                            @enderror
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            <div class="row">
                <div class="col-12 dropdown-divider">
                </div>
                <div class="col-12 mt-3">
                    <p class="lead text-justify">
                        1. Seleccionar el tipo de entrevista.<br>
                        2. Evaluar las competencias de la siguiente manera: Por cada competencia elegir una pregunta y con base a su criterio capture la respuesta del entrevistado seleccionando un valor del 1 al 5, donde <span class="badge bg-gradient-dark">1</span> se considera la calificación mas baja y <span class="badge bg-gradient-dark">5</span> la calificación mas alta.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Tipo de entrevista</label>
                        <select wire:model="tipo"
                                class="form-control {{ $errors->has('tipo') ? 'is-invalid' :'' }}"
                                name="tipo"
                                id="tipo">
                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            <option value="SEL">SEL</option>
                            <option value="CAEL">CAEL</option>
                        </select>
                        @error('tipo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            @if($tipo)
                <div class="row">
                    <ul class="col-md-12 list-group list-group-horizontal-md pb-3">
                        <li class="list-group-item fs-15"><span class="badge bg-gray-dark">1</span> No lo demostró</li>
                        <li class="list-group-item fs-15"><span class="badge bg-gray-dark">2</span> Insuficiente</li>
                        <li class="list-group-item fs-15"><span class="badge bg-gray-dark">3</span> Regular</li>
                        <li class="list-group-item fs-15"><span class="badge bg-gray-dark">4</span> Aceptable</li>
                        <li class="list-group-item fs-15"><span class="badge bg-gray-dark">5</span> Consolidado o excelente</li>
                    </ul>
                </div>
            @endif
            <div class="form row">
              @if($tipo)
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                            <tr>
                                <th class="w-75">Competencias</th>
                                <th><span class="badge bg-gray-dark">1</span></th>
                                <th><span class="badge bg-gray-dark">2</span></th>
                                <th><span class="badge bg-gray-dark">3</span></th>
                                <th><span class="badge bg-gray-dark">4</span></th>
                                <th><span class="badge bg-gray-dark">5</span></th>
                            </tr>
                          </thead>
                          @if($tipo === 'SEL')
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-between  {{ $errors->has('competencia_1_pregunta') ? 'border border-danger' : ''}}">
                                        <h5 class="text-bold">Liderazgo <span class="badge badge-success">+ 20 Puntos</span></h5>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="1"
                                                   wire:model="competencia_1_pregunta"
                                                   id="competencia_1_p_1_sel"
                                                   name="competencia_1_p_1_sel" />
                                            <label for="competencia_1_p_1_sel" class="form-check-label fs-13 text-justify">1.- Cuéntame algún ejemplo en el que hayas tomado la iniciativa en un proyecto difícil</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="2"
                                                   wire:model="competencia_1_pregunta"
                                                   id="competencia_1_p_2_sel"
                                                   name="competencia_1_p_2_sel" />
                                            <label for="competencia_1_p_2_sel" class="form-check-label fs-13 text-justify">2.- Relata una situación en la que asumiste el papel de líder. ¿Qué desafíos afrontaste y cómo los abordaste?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="3"
                                                   wire:model="competencia_1_pregunta"
                                                   id="competencia_1_p_3_sel"
                                                   name="competencia_1_p_3_sel" />
                                            <label for="competencia_1_p_3_sel" class="form-check-label fs-13 text-justify">3.- ¿Qué hace para mantener a su equipo motivado y comprometido? Deme un ejemplo</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="4"
                                                   wire:model="competencia_1_pregunta"
                                                   id="competencia_1_p_4_sel"
                                                   name="competencia_1_p_4_sel" />
                                            <label for="competencia_1_p_4_sel" class="form-check-label fs-13 text-justify">4.- ¿Cómo lo hace para distribuir y delegar tareas a su equipo de trabajo?  </label>
                                        </div>
                                        @error('competencia_1_pregunta')
                                        <div class="text-justify">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="4"
                                               wire:model="competencia_1_respuesta"
                                               id="competencia_1_r_1_sel"
                                               name="competencia_1_r_1_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="8"
                                               wire:model="competencia_1_respuesta"
                                               id="competencia_1_r_2_sel"
                                               name="competencia_1_r_2_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="12"
                                               wire:model="competencia_1_respuesta"
                                               id="competencia_1_r_3_sel"
                                               name="competencia_1_r_3_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="16"
                                               wire:model="competencia_1_respuesta"
                                               id="competencia_1_r_4_sel"
                                               name="competencia_1_r_4_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="20"
                                               wire:model="competencia_1_respuesta"
                                               id="competencia_1_r_5_sel"
                                               name="competencia_1_r_5_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_2_pregunta') ? 'border border-danger' : ''}}">
                                        <h5 class="text-bold">Trabajo bajo presión <span class="badge badge-success">+ 20 Puntos</span></h5>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="1"
                                                   wire:model="competencia_2_pregunta"
                                                   id="competencia_2_p_1_sel"
                                                   name="competencia_2_p_1_sel" />
                                            <label for="competencia_2_p_1_sel" class="form-check-label fs-13 text-justify">1.- Hábleme de un problema difícil que haya podido resolver ¿cómo lo resolvió y que resultados obtuvo?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="2"
                                                   wire:model="competencia_2_pregunta"
                                                   id="competencia_2_p_2_sel"
                                                   name="competencia_2_p_2_sel" />
                                            <label for="competencia_2_p_2_sel" class="form-check-label fs-13 text-justify">2.- Cuéntame alguna situación en la que hayas tenido que trabajar dentro de límites muy estrictos de tiempo.</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="3"
                                                   wire:model="competencia_2_pregunta"
                                                   id="competencia_2_p_3_sel"
                                                   name="competencia_2_p_3_sel" />
                                            <label for="competencia_2_p_3_sel" class="form-check-label fs-13 text-justify">3.- Cuéntanos sobre una situación en la que el conflicto generó un resultado negativo.
                                                ¿Cómo manejaste la situación y qué aprendiste de ella?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="4"
                                                   wire:model="competencia_2_pregunta"
                                                   id="competencia_2_p_4_sel"
                                                   name="competencia_2_p__sel" />
                                            <label for="competencia_2_p_4_sel" class="form-check-label fs-13 text-justify">4.- Cuéntame sobre las situaciones de cambio más importantes a las que te has enfrentado
                                                ¿Cómo te las arreglaste?</label>
                                        </div>
                                        @error('competencia_2_pregunta')
                                        <div class="text-justify">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="4"
                                               wire:model="competencia_2_respuesta"
                                               id="competencia_2_r_1_sel"
                                               name="competencia_2_r_1_sel" />
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="8"
                                               wire:model="competencia_2_respuesta"
                                               id="competencia_2_r_2_sel"
                                               name="competencia_2_r_2_sel" />
                                        <label for="competencia_2_r_2_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="12"
                                               wire:model="competencia_2_respuesta"
                                               id="competencia_2_r_3_sel"
                                               name="competencia_2_r_3_sel" />
                                        <label for="competencia_2_r_3_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="16"
                                               wire:model="competencia_2_respuesta"
                                               id="competencia_2_r_4_sel"
                                               name="competencia_2_r_4_sel" />
                                        <label for="competencia_2_r_4_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="20"
                                               wire:model="competencia_2_respuesta"
                                               id="competencia_2_r_4_sel"
                                               name="competencia_2_r_4_sel" />
                                        <label for="competencia_2_r_4_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_3_pregunta') ? 'border border-danger' : ''}}">
                                        <h5 class="text-bold">Orientación al servicio <span class="badge badge-success">+ 20 Puntos</span></h5>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="1"
                                                   wire:model="competencia_3_pregunta"
                                                   id="competencia_3_p_1_sel"
                                                   name="competencia_3_p_1_sel" />
                                            <label for="competencia_3_p_1_sel" class="form-check-label fs-13 text-justify">1.- ¿Cómo defines el servicio a la ciudadanía?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="2"
                                                   wire:model="competencia_3_pregunta"
                                                   id="competencia_3_p_2_sel"
                                                   name="competencia_3_p_2_sel" />
                                            <label for="competencia_3_p_2_sel" class="form-check-label fs-13 text-justify">2.- Dame un ejemplo de una ocasión en la que proporcionaste un servicio excepcional a un ciudadano y/o cliente</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="3"
                                                   wire:model="competencia_3_pregunta"
                                                   id="competencia_3_p_3_sel"
                                                   name="competencia_3_p_3_sel" />
                                            <label for="competencia_3_p_3_sel" class="form-check-label fs-13 text-justify">3.- ¿Por qué quieres trabajar en el IEPC al servicio de la ciudadanía y que te llevó a ingresar en este campo?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="4"
                                                   wire:model="competencia_3_pregunta"
                                                   id="competencia_3_p_4_sel"
                                                   name="competencia_3_p_4_sel" />
                                            <label for="competencia_3_p_4_sel" class="form-check-label fs-13 text-justify">4.- Describe un escenario de servicio en el que lograste convertir a un ciudadano insatisfecho en uno satisfecho</label>
                                        </div>
                                        @error('competencia_3_pregunta')
                                        <div class="text-justify">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="4"
                                               wire:model="competencia_3_respuesta"
                                               id="competencia_3_r_1_sel"
                                               name="competencia_3_r_1_sel" />
                                        <label for="competencia_3_r_1_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="8"
                                               wire:model="competencia_3_respuesta"
                                               id="competencia_3_r_2_sel"
                                               name="competencia_3_r_2_sel" />
                                        <label for="competencia_3_r_2_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="12"
                                               wire:model="competencia_3_respuesta"
                                               id="competencia_3_r_3_sel"
                                               name="competencia_3_r_3_sel" />
                                        <label for="competencia_3_r_3_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="16"
                                               wire:model="competencia_3_respuesta"
                                               id="competencia_3_r_4_sel"
                                               name="competencia_3_r_4_sel" />
                                        <label for="competencia_3_r_4_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="20"
                                               wire:model="competencia_3_respuesta"
                                               id="competencia_3_r_5_sel"
                                               name="competencia_3_r_5_sel" />
                                        <label for="competencia_3_r_5_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_4_pregunta') ? 'border border-danger' : ''}}">
                                        <h5 class="text-bold">Manejo y resolución de problemas <span class="badge badge-success">+ 20 Puntos</span></h5>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="1"
                                                   wire:model="competencia_4_pregunta"
                                                   id="competencia_4_p_1_sel"
                                                   name="competencia_4_p_1_sel" />
                                            <label for="competencia_4_p_1_sel" class="form-check-label fs-13 text-justify">1.- Describe el mayor problema relacionado con el trabajo que hayas experimentado.  ¿Cómo lo solucionaste?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="2"
                                                   wire:model="competencia_4_pregunta"
                                                   id="competencia_4_p_2_sel"
                                                   name="competencia_4_p_2_sel" />
                                            <label for="competencia_4_p_2_sel" class="form-check-label fs-13 text-justify">2.- Describe una ocasión en la que hayas tenido que cambiar tu estrategia en el último momento. ¿Cómo manejaste esta situación?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="3"
                                                   wire:model="competencia_4_pregunta"
                                                   id="competencia_4_p_3_sel"
                                                   name="competencia_4_p_3_sel" />
                                            <label for="competencia_4_p_3_sel" class="form-check-label fs-13 text-justify">3.- ¿Puedes pensar en una situación de trabajo en la que hayas visto una oportunidad en un problema potencial? ¿Qué hiciste? ¿Cuál fue el resultado?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="4"
                                                   wire:model="competencia_4_pregunta"
                                                   id="competencia_4_p_4_sel"
                                                   name="competencia_4_p_4_sel" />
                                            <label for="competencia_4_p_4_sel" class="form-check-label fs-13 text-justify">4.- ¿Alguna vez has tenido un plazo que no hayas podido cumplir? ¿Qué pasó? ¿Cómo lo resolviste?</label>
                                        </div>
                                        @error('competencia_4_pregunta')
                                        <div class="text-justify">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="4"
                                               wire:model="competencia_4_respuesta"
                                               id="competencia_4_r_1_sel"
                                               name="competencia_4_r_1_sel" />
                                        <label for="competencia_4_r_1_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="8"
                                               wire:model="competencia_4_respuesta"
                                               id="competencia_4_r_2_sel"
                                               name="competencia_4_r_2_sel" />
                                        <label for="competencia_4_r_2_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="12"
                                               wire:model="competencia_4_respuesta"
                                               id="competencia_4_r_3_sel"
                                               name="competencia_4_r_3_sel" />
                                        <label for="competencia_4_r_3_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="16"
                                               wire:model="competencia_4_respuesta"
                                               id="competencia_4_r_4_sel"
                                               name="competencia_4_r_4_sel" />
                                        <label for="competencia_4_r_4_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="20"
                                               wire:model="competencia_4_respuesta"
                                               id="competencia_4_r_5_sel"
                                               name="competencia_4_r_5_sel" />
                                        <label for="competencia_4_r_5_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_5_pregunta') ? 'border border-danger' : ''}}">
                                        <h5 class="text-bold">Planeación <span class="badge badge-success">+ 20 Puntos</span></h5>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="1"
                                                   wire:model="competencia_5_pregunta"
                                                   id="competencia_5_p_1_sel"
                                                   name="competencia_5_p_1_sel" />
                                            <label for="competencia_5_p_1_sel" class="form-check-label fs-13 text-justify">1.- Cuéntame cómo te organizas cuando tienes mucho trabajo. ¿Por dónde empiezas? ¿Cómo te aseguras que todo se haga? ¿Cómo te sientes cuando tienes tanto que hacer? </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="2"
                                                   wire:model="competencia_5_pregunta"
                                                   id="competencia_5_p_2_sel"
                                                   name="competencia_5_p_2_sel" />
                                            <label for="competencia_5_p_2_sel" class="form-check-label fs-13 text-justify">2.- Cuéntame un ejemplo de cuando hayas tenido que organizar un área de trabajo o un evento. ¿Qué tuviste
                                                que hacer? ¿Cómo te organizaste y planificaste para ello?¿Qué plazos previste? ¿Cuál fue el resultado?
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="3"
                                                   wire:model="competencia_5_pregunta"
                                                   id="competencia_5_p_3_sel"
                                                   name="competencia_5_p_3_sel" />
                                            <label for="competencia_5_p_3_sel" class="form-check-label fs-13 text-justify">3.- Cuéntame una situación especial en la que demostraras eficacia organizando y controlando tu trabajo. ¿Qué ocurrió?  ¿Cuál fue el resultado final? ¿Por qué crees que lograste ser eficaz en esa ocasión?</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   value="4"
                                                   wire:model="competencia_5_pregunta"
                                                   id="competencia_5_p_4_sel"
                                                   name="competencia_5_p_4_sel"  />
                                            <label for="competencia_5_p_4_sel" class="form-check-label fs-13 text-justify">4.- Cuéntame otra situación en la que no actuaras de forma eficaz organizando y controlando su trabajo?</label>
                                        </div>
                                        @error('competencia_5_pregunta')
                                        <div class="text-justify">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_5_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="4"
                                               wire:model="competencia_5_respuesta"
                                               id="competencia_5_r_1_sel"
                                               name="competencia_5_r_1_sel"/>
                                        <label class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_5_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="8"
                                               wire:model="competencia_5_respuesta"
                                               id="competencia_5_r_2_sel"
                                               name="competencia_5_r_2_sel" />
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_5_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="12"
                                               wire:model="competencia_5_respuesta"
                                               id="competencia_5_r_3_sel"
                                               name="competencia_5_r_3_sel"/>
                                        <label for="" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check {{ $errors->has('competencia_5_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="16"
                                               wire:model="competencia_5_respuesta"
                                               id="competencia_5_r_4_sel"
                                               name="competencia_5_r_4_sel"/>
                                        <label for="competencia_5_r_4_sel" class="form-check-label"></label>
                                    </div>
                                </td>
                                <td><div class="form-check {{ $errors->has('competencia_5_respuesta') ? 'border border-danger' : ''}}">
                                        <input type="radio"
                                               class="form-check-input"
                                               value="20"
                                               wire:model="competencia_5_respuesta"
                                               id="competencia_5_r_5_sel"
                                               name="competencia_5_r_5_sel" />
                                        <label for="competencia_5_r_5_sel" class="form-check-label"></label>
                                    </div></td>
                            </tr>
                          </tbody>
                          @endif
                          @if($tipo === 'CAEL')
                              <tbody>
                              <tr>
                                  <td>
                                      <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_1_pregunta') ? 'border border-danger' : ''}}">
                                          <h5 class="text-bold">Persuasión y negociación <span class="badge badge-success">+ 25 Puntos</span></h5>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="1"
                                                     wire:model="competencia_1_pregunta"
                                                     id="competencia_1_p_1_cael"
                                                     name="competencia_1_p_1_cael" />
                                              <label for="competencia_1_p_1_cael" class="form-check-label fs-13 text-justify">1.- Cuéntame como una ocasión en la que tuviste que convencer a alguien para que hiciera algo</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="2"
                                                     wire:model="competencia_1_pregunta"
                                                     id="competencia_1_p_2_cael"
                                                     name="competencia_1_p_2_cael" />
                                              <label for="competencia_1_p_2_cael" class="form-check-label fs-13 text-justify">2.- Podrías explicar un ejemplo de una negociación que tuviste pero que sentiste que te estaban haciendo presión  ¿a que conclusión llegaste? ¿Cómo termino la negociación?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="3"
                                                     wire:model="competencia_1_pregunta"
                                                     id="competencia_1_p_3_cael"
                                                     name="competencia_1_p_3_cael" />
                                              <label for="competencia_1_p_3_cael" class="form-check-label fs-13 text-justify">3.- Cuéntame una ocasión en la que tuviste que negociar y te sintieras orgulloso con el resultado</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="4"
                                                     wire:model="competencia_1_pregunta"
                                                     id="competencia_1_p_4_cael"
                                                     name="competencia_1_p_4_cael"/>
                                              <label for="competencia_1_p_4_cael" class="form-check-label fs-13 text-justify">4.- En alguna negociación has cambiado tu comportamiento, método o incluso, visión para llegar a un acuerdo</label>
                                          </div>
                                          @error('competencia_1_pregunta')
                                          <div class="text-justify">
                                              <small class="text-danger">{{ $message }}</small>
                                          </div>
                                          @enderror
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="5"
                                                 wire:model="competencia_1_respuesta"
                                                 id="competencia_1_r_1_cael"
                                                 name="competencia_1_p_1_cael" />
                                          <label class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="10"
                                                 wire:model="competencia_1_respuesta"
                                                 id="competencia_1_r_2_cael"
                                                 name="competencia_1_r_2_cael" />
                                          <label  class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="15"
                                                 wire:model="competencia_1_respuesta"
                                                 id="competencia_1_r_3_cael"
                                                 name="competencia_1_r_3_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="20"
                                                 wire:model="competencia_1_respuesta"
                                                 id="competencia_1_r_4_cael"
                                                 name="competencia_1_r_4_cael" />
                                          <label class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_1_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="25"
                                                 wire:model="competencia_1_respuesta"
                                                 id="competencia_1_r_5_cael"
                                                 name="competencia_1_r_5_cael" />
                                          <label class="form-check-label"></label>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_2_pregunta') ? 'border border-danger' : ''}}">
                                          <h5 class="text-bold">Orientación al servicio <span class="badge badge-success">+ 25 Puntos</span></h5>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="1"
                                                     wire:model="competencia_2_pregunta"
                                                     id="competencia_2_p_1_cael"
                                                     name="competencia_2_p_1_cael" />
                                              <label for="competencia_2_p_1_cael" class="form-check-label fs-13 text-justify">1.- ¿Cómo defines el servicio a la ciudadanía?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="2"
                                                     wire:model="competencia_2_pregunta"
                                                     id="competencia_2_p_2_cael"
                                                     name="competencia_2_p_2_cael" />
                                              <label for="competencia_2_p_2_cael" class="form-check-label fs-13 text-justify">2.- Dame un ejemplo de una ocasión en la que proporcionaste un servicio excepcional a un ciudadano y/o cliente.</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="3"
                                                     wire:model="competencia_2_pregunta"
                                                     id="competencia_2_p_3_cael"
                                                     name="competencia_2_p_3_cael" />
                                              <label for="competencia_2_p_3_cael" class="form-check-label fs-13 text-justify">3.- ¿Por qué quieres trabajar en el IEPC al servicio de la ciudadanía y que te llevó a ingresar en este campo?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="4"
                                                     wire:model="competencia_2_pregunta"
                                                     id="competencia_2_p_4_cael"
                                                     name="competencia_2_p_4_cael" />
                                              <label for="competencia_2_p_4_cael" class="form-check-label fs-13 text-justify">4.- Describe un escenario de servicio en el que lograste convertir a un ciudadano insatisfecho en uno satisfecho</label>
                                          </div>
                                          @error('competencia_2_pregunta')
                                          <div class="text-justify">
                                              <small class="text-danger">{{ $message }}</small>
                                          </div>
                                          @enderror
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="5"
                                                 wire:model="competencia_2_respuesta"
                                                 id="competencia_2_r_1_cael"
                                                 name="competencia_2_r_1_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="10"
                                                 wire:model="competencia_2_respuesta"
                                                 id="competencia_2_r_2_cael"
                                                 name="competencia_2_r_2_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="15"
                                                 wire:model="competencia_2_respuesta"
                                                 id="competencia_2_r_3_cael"
                                                 name="competencia_2_r_3_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="20"
                                                 wire:model="competencia_2_respuesta"
                                                 id="competencia_2_r_4_cael"
                                                 name="competencia_2_r_4_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_2_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="25"
                                                 wire:model="competencia_2_respuesta"
                                                 id="competencia_2_r_5_cael"
                                                 name="competencia_2_r_5_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_3_pregunta') ? 'border border-danger' : ''}}">
                                          <h5 class="text-bold">Trabajo bajo presión <span class="badge badge-success">+ 25 Puntos</span></h5>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="1"
                                                     wire:model="competencia_3_pregunta"
                                                     id="competencia_3_p_1_cael"
                                                     name="competencia_3_p_1_cael" />
                                              <label for="competencia_3_p_1_cael" class="form-check-label fs-13 text-justify">1.- Hábleme de un problema difícil que haya podido resolver ¿cómo lo resolvió y que resultados obtuvo?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="2"
                                                     wire:model="competencia_3_pregunta"
                                                     id="competencia_3_p_2_cael"
                                                     name="competencia_3_p_2_cael"/>
                                              <label for="competencia_3_p_2_cael" class="form-check-label fs-13 text-justify">2.- Cuéntame alguna situación en la que hayas tenido que trabajar dentro de límites muy estrictos de tiempo.</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="3"
                                                     wire:model="competencia_3_pregunta"
                                                     id="competencia_3_p_3_cael"
                                                     name="competencia_3_p_3_cael" />
                                              <label for="competencia_3_p_3_cael" class="form-check-label fs-13 text-justify">3.- Cuéntanos sobre una situación en la que el conflicto generó un resultado negativo. ¿Cómo manejaste la situación y qué aprendiste de ella?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="4"
                                                     wire:model="competencia_3_pregunta"
                                                     id="competencia_3_p_4_cael"
                                                     name="competencia_3_p_4_cael" />
                                              <label for="competencia_3_p_4_cael" class="form-check-label fs-13 text-justify">4.- Cuéntame sobre las situaciones de cambio más importantes a las que te has enfrentado ¿Cómo te las arreglaste?
                                              </label>
                                          </div>
                                          @error('competencia_3_pregunta')
                                          <div class="text-justify">
                                              <small class="text-danger">{{ $message }}</small>
                                          </div>
                                          @enderror
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="5"
                                                 wire:model="competencia_3_respuesta"
                                                 id="competencia_3_r_1_cael"
                                                 name="competencia_3_r_1_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td><div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="10"
                                                 wire:model="competencia_3_respuesta"
                                                 id="competencia_3_r_2_cael"
                                                 name="competencia_3_r_2_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div></td>
                                  <td><div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="15"
                                                 wire:model="competencia_3_respuesta"
                                                 id="competencia_3_r_3_cael"
                                                 name="competencia_3_r_3_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div></td>
                                  <td><div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="20"
                                                 wire:model="competencia_3_respuesta"
                                                 id="competencia_3_r_4_cael"
                                                 name="competencia_3_r_4_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div></td>
                                  <td><div class="form-check {{ $errors->has('competencia_3_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="25"
                                                 wire:model="competencia_3_respuesta"
                                                 id="competencia_3_r_5_cael"
                                                 name="competencia_3_r_5_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div></td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="d-flex flex-column justify-content-between {{ $errors->has('competencia_4_pregunta') ? 'border border-danger' : ''}}">
                                          <h5 class="text-bold">Trabajo en campo <span class="badge badge-success">+ 25 Puntos</span></h5>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="1"
                                                     wire:model="competencia_4_pregunta"
                                                     id="competencia_4_p_1_cael"
                                                     name="competencia_4_p_1_cael" />
                                              <label for="competencia_4_p_1_cael" class="form-check-label fs-13 text-justify">1.- ¿Estarías dispuesto(a) a moverte a diferentes puntos para el cumplimiento de tus objetivos?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="2"
                                                     wire:model="competencia_4_pregunta"
                                                     id="competencia_4_p_2_cael"
                                                     name="competencia_4_p_2_cael" />
                                              <label for="competencia_4_p_2_cael" class="form-check-label fs-13 text-justify">2.- ¿Cuéntanos sobre una situación en la que tuviste que trabajar en condiciones adversas para el cumplimiento de los objetivos?
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="3"
                                                     wire:model="competencia_4_pregunta"
                                                     id="competencia_4_p_3_cael"
                                                     name="competencia_4_p_3_cael" />
                                              <label for="competencia_4_p_3_cael" class="form-check-label fs-13 text-justify">3.- Cuéntanos sobre situaciones que tuviste que trasladarte a otros lugares para el cumplimiento de tus objetivos ¿Cómo lo hiciste? ¿Cómo lo resolviste?</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio"
                                                     class="form-check-input"
                                                     value="4"
                                                     wire:model="competencia_4_pregunta"
                                                     id="competencia_4_p_4_cael"
                                                     name="competencia_4_p_4_cael" />
                                              <label for="competencia_4_p_4_cael" class="form-check-label fs-13 text-justify">4.- Cuéntanos tu mecanismo de ubicación que empleas para desplazarte para la realización de tus actividades físicas ¿Qué empleas? ¿Qué utilizas?</label>
                                          </div>
                                          @error('competencia_4_pregunta')
                                          <div class="text-justify">
                                              <small class="text-danger">{{ $message }}</small>
                                          </div>
                                          @enderror
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="5"
                                                 wire:model="competencia_4_respuesta"
                                                 id="competencia_4_r_1_cael"
                                                 name="competencia_4_r_1_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="10"
                                                 wire:model="competencia_4_respuesta"
                                                 id="competencia_4_r_cael"
                                                 name="competencia_4_r_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="15"
                                                 wire:model="competencia_4_respuesta"
                                                 id="competencia_4_r_cael"
                                                 name="competencia_4_r_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="20"
                                                 wire:model="competencia_4_respuesta"
                                                 id="competencia_4_r_4_cael"
                                                 name="competencia_4_r_4_cael" />
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check {{ $errors->has('competencia_4_respuesta') ? 'border border-danger' : ''}}">
                                          <input type="radio"
                                                 class="form-check-input"
                                                 value="25"
                                                 wire:model="competencia_4_respuesta"
                                                 id="competencia_4_r_5_cael"
                                                 name="competencia_4_r_5_cael"/>
                                          <label for="" class="form-check-label"></label>
                                      </div>
                                  </td>
                              </tr>
                              </tbody>
                          @endif
                      </table>
                  </div>
              @endif
            </div>
        </div>
        <div class="modal-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 d-flex flex-column flex-md-row justify-content-start">
                        @if($tipo)
                            <div class="form-group">
                                <strong>Puntos obtenidos : </strong> <span class="badge badge-success fs-15">{{ $this->resultado }} de 100</span>
                            </div>
                            <div class="form-group ml-md-2">
                                <strong> % Calificación Obtenida: </strong> <span class="badge badge-success fs-15">{{ $this->porcentajeObtenido }} %  de 40 %</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-12 text-md-right">
                        <button type="button" class="btn btn-danger close-btn"
                                wire:loading.remove wire:target="guardar,generarAcuse"
                                data-dismiss="modal">Cerrar</button>

                        <button class="btn btn-success" wire:loading.remove wire:target="generarAcuse" wire:click="guardar">
                            <span wire:loading.remove wire:target="guardar">{{ $entrevista?->id ? 'Actualizar' : 'Guardar' }}</span>
                            <span wire:loading wire:target="guardar">Guardando información...</span>
                        </button>
                        @if($this->entrevista?->id > 0 && $this->tipo && !$this->cambio_de_tipo)
                            <button class="btn bg-gradient-navy" wire:click="generarAcuse">
                                <span wire:loading.remove wire:target="generarAcuse"><i class="fa fa-download"></i> Descargar Acuse</span>
                                <span wire:loading wire:target="generarAcuse">Generando documento espere un momento...</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

