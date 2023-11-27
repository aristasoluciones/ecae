@section('title', 'Nuevo registro')
@section('content_header')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="xtitulox"><i class="fa fa-users text-secondary"> Registro de aspirantes</i></h1>
            </div>
        </div>
    </div>

@stop
<div class="container">
    @if(!$this->registrado)
    <div class="card card-secondary">
        <div class="card-body p-5">
            {{-- SECCION UNO --}}
            <div class="form-row">
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Municipio/Alcadía</label>
                        <select class="form-control"
                                id="municipio"
                                name="municipio"
                                wire:model.defer="municipio">
                            <option
                                value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach($this->municipios as $municipio)
                                <option value="{{$municipio}}">{{$municipio}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('municipio')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>localidad</label>
                        <input wire:model.defer="localidad" id="localidad" type="text" class="form-control "/>
                    </div>
                    @error('localidad')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Sede</label>
                        <select class="form-control"
                                id="sede"
                                name="sede"
                                wire:model.defer="sede">
                            <option
                                value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach($this->municipios as $municipio)
                                <option value="{{$municipio}}">{{$municipio}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sede')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Tipo de sede</label>
                        <select class="form-control"
                                id="tipo_sede"
                                name="tipo_sede"
                                wire:model.defer="tipo_sede">
                            <option
                                value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            <option value="Fija">Fija</option>
                            <option value="Alterna">Alterna</option>
                        </select>
                    </div>
                    @error('tipo_sede')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- SECCION DOS --}}
            <div class="form-row">
                <div class="col-12 divider">
                    <h3 class="dropdown-divider"></h3>
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Clave de elector</label>
                        <input wire:model.defer="clave_elector" id="clave_elector" type="text"
                               class="form-control "/>
                    </div>
                    @error('clave_elector')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Sección electoral</label>
                        <input wire:model.defer="seccion_electoral" id="seccion_electoral" type="number" class="form-control "/>
                    </div>
                    @error('seccion_electoral')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>RFC</label>
                        <input wire:model.defer="rfc" id="rfc" type="text"
                               class="form-control "/>
                    </div>
                    @error('rfc')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Nombre</label>
                        <input wire:model.defer="nombre" id="nombre" type="text"
                               class="form-control "/>
                    </div>
                    @error('nombre')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Primero Apellido</label>
                        <input wire:model.defer="apellido1" id="apellid1" type="text"
                               class="form-control "/>
                    </div>
                    @error('apellido1')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Segundo Apellido</label>
                        <input wire:model.defer="apellido2" id="apellido2" type="text"
                               class="form-control "/>
                    </div>
                    @error('apellido2')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>CURP</label>
                        <input wire:model.defer="curp" id="curp" type="text"
                               class="form-control "/>
                    </div>
                    @error('curp')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Fecha de nacimiento</label>
                        <input wire:model.defer="fecha_nacimiento" id="fecha_nacimiento" type="date"
                               class="form-control "/>
                    </div>
                    @error('fecha_nacimiento')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Edad</label>
                        <input wire:model.defer="edad" id="edad" type="number"
                               class="form-control "/>
                    </div>
                    @error('edad')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Género</label>
                        <select wire:model.defer="genero" class="form-control">
                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach ($this->sexos as $sexo)
                                <option value="{{ $sexo }}" wire:key="sexo-{{ $sexo }}">{{ $sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('genero')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>¿Se identifica como una persona  LGBTTTIQ+?</label>
                        <select wire:model="persona_lgbtttiq" class="form-control">
                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    @if($persona_lgbtttiq === 'Otro')
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>Especifique</label>
                            <input wire:model="otra_lgbtttiq" class="form-control">
                        </div>
                    @endif
                    @error('persona_lgbtttiq')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-12 divider">
                    <h3 class="dropdown-divider"></h3>
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Calle</label>
                        <input wire:model.defer="dom_calle" id="dom_calle" type="text"
                               class="form-control "/>
                    </div>
                    @error('dom_calle')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Número exterior</label>
                        <input wire:model.defer="dom_num_exterior" id="dom_num_exterior" type="number"
                               class="form-control "/>
                    </div>
                    @error('dom_num_exterior')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger "></span>Número interior</label>
                        <input wire:model.defer="dom_num_interior" id="dom_num_interior" type="number"
                               class="form-control "/>
                    </div>
                    @error('dom_num_interior')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Colonia</label>
                        <input wire:model.defer="dom_colonia" id="dom_colonia" type="text"
                               class="form-control "/>
                    </div>
                    @error('dom_colonia')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Municipio/Alcaldía</label>
                        <select wire:model="dom_municipio" class="form-control">
                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach ($this->municipios as $municipio)
                                <option value="{{ $municipio }}" wire:key="municipio-{{ $municipio }}">{{ $municipio }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('dom_municipio')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Localidad</label>
                        <input wire:model.defer="dom_localidad" id="dom_localidad" type="text"
                               class="form-control "/>
                    </div>
                    @error('dom_localidad')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Teléfono fijo</label>
                        <input wire:model.defer="tel_fijo" id="tel_fijo" type="number"
                               class="form-control "/>
                    </div>
                    @error('tel_fijo')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>Teléfono celular</label>
                        <input wire:model.defer="tel_celular" id="tel_celular" type="number"
                               class="form-control "/>
                    </div>
                    @error('tel_celular')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- SECCION TRES --}}
            <div class="form-row">
                <div class="col-12 dropdown-divider"></div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span> Maximo grado de estudios</label>
                        <select wire:model.defer="ultimo_grado_estudio" class="form-control"><option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach ($this->grados as $grado)
                                <option value="{{ $grado}}" wire:key="grado-{{ $grado }}">{{ $grado }}</option>
                            @endforeach
                        </select>
                        @error('ultimo_grado_estudio')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span> Medio por el que se enteró de la convocatoria</label>
                        <select wire:model.defer="medio_convocatoria" class="form-control"><option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                            @foreach ($this->tiposDeMedio as $tipos_de_medio)
                                <option value="{{ $tipos_de_medio}}" wire:key="tipos-de-medio{{ $tipos_de_medio }}">{{ $tipos_de_medio }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('medio_convocatoria')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class=""><span class="text-danger ">*</span>¿Realiza estudios actualmente? Especifique:</label>
                        <input wire:model.defer="realiza_estudios" id="realiza_estudios" type="text" class="form-control "/>
                        @error('realiza_estudios')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group" wire:ignore>
                        <label class=""><span class="text-danger ">*</span>¿Cual es el motivo por el que quiere participar como SE o CAE Local? Especifique:</label>
                        <input wire:model.defer="motivo_secae" id="motivo_secae" type="text" class="form-control "/>
                    </div>
                    @error('motivo_secae')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th colspan="5" class="text-center"><span class="text-danger"></span>Experiencia</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-center text-gray">(Señale los tres últimos empleos o prestaciones de servicios. El no contar con experiencia no será causa de exclusión)</th>
                        </tr>

                        <tr>
                            <th>Nombre de la empresa o institución</th>
                            <th>Puesto</th>
                            <th colspan="2">
                                <div class="row">
                                    <div class="col-12">Periodo en que laboro</div>
                                    <div class="col-6">Fecha inicio</div>
                                    <div class="col-6">Fecha final</div>
                                </div></th>
                            <th>Telefono</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($experiencia_laboral) > 0)
                            @foreach($experiencia_laboral as $kexperiencia => $experiencia)
                                <tr>
                                    <td>
                                        <input class="form-control"
                                               type="text"
                                               wire:model.defer="experiencia_laboral.{{$kexperiencia}}.nombre" />
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               type="text"
                                               wire:model.defer="experiencia_laboral.{{$kexperiencia}}.puesto" />
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               type="date"
                                               wire:model.defer="experiencia_laboral.{{$kexperiencia}}.inicio" />
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               type="date"
                                               wire:model.defer="experiencia_laboral.{{$kexperiencia}}.fin" />
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               type="text"
                                               wire:model.defer="experiencia_laboral.{{$kexperiencia}}.telefono" />
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @error('otra_formacion')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <h3 class="text-bold">Otros datos</h3>
                </div>
                <div class="col-12 dropdown-divider"></div>

                {{-- Pregunta numero 1 --}}
                <div class="form-row">
                    <div class="col-12"><h5>1- ¿ Has participado en proceso electoral ?</h5></div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input"
                                   value="Si"
                                   wire:model="p1_proceso_electoral"
                                   id="p1_proceso_electoral"
                                   name="p1_proceso_electoral">
                            <label
                                class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input"
                                   value="No"
                                   wire:model="p1_proceso_electoral"
                                   id="p1_proceso_electoral"
                                   name="p1_proceso_electoral">
                            <label
                                class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p1_proceso_electoral')<span class="text-danger error h6">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @if($p1_proceso_electoral === 'Si')
            {{-- Pregunta numero 1.1 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>1.1- Cual</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           wire:model="p1_1_cual"
                           id="p1_1_cual"
                           name="p1_1_cual">
                </div>
                <div class="col-12">
                    @error('p1_1_cual')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            @endif
            {{-- Pregunta numero 1.2 --}}
            @if($p1_proceso_electoral === 'Si')
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>1.2- De que forma</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           wire:model="p1_2_forma"
                           id="p1_2_forma"
                           name="p1_2_forma">
                </div>
                <div class="col-12">
                    @error('p1_2_forma')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            @endif

            {{-- Pregunta numero 2 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>2- ¿Tiene disponibilidad de tiempo para prestar sus servicios en horario fuera de lo habitual?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p2_disponibilidad"
                               id="p2_disponibilidad"
                               name="p2_disponibilidad">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p2_disponibilidad"
                               id="p2_disponibilidad"
                               name="p2_disponibilidad">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p2_disponibilidad')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>


            {{-- Pregunta numero 3 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>3. ¿Está dispuesta/o a prestar sus servicios en fines de semana y días festivos?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p3_finsemana"
                               id="p3_finsemana"
                               name="p3_finsemana">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p3_finsemana"
                               id="p3_finsemana"
                               name="p3_finsemana">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p3_finsemana')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>

            {{-- Prgeunta numero 4 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>4. ¿Está dispuesta/o a realizar actividades de campo? (visitar a la ciudadanía casa por casa, trasladarse grandes distancias, entre otras)</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p4_campo"
                               id="p4_campo"
                               name="p4_campo">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p4_campo"
                               id="p4_campo"
                               name="p4_campo">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p4_campo')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>

            {{-- Pregunta numero 5 --}}
            <div class="form-row justify-content-between mb-3" >
                <div class="col-12"><h5>5. ¿Milita en algún partido político u organización política o ha participado activamente en alguna campaña electoral en el último año?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p5_milita"
                               id="p5_milita"
                               name="p5_milita">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p5_milita"
                               id="p5_milita"
                               name="p5_milita">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p5_milita')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- Prgeunta numero 6 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>6. ¿Ha participado como representante de partido político con registro vigente, candidatura independiente registrada en el PE 2023-2024 o coalición en alguna elección realizada en los últimos tres años?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p6_como_representante"
                               id="p6_como_representante"
                               name="p6_como_representante">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p6_como_representante"
                               id="p6_como_representante"
                               name="p6_como_representante">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p6_como_representante')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- Prgeunta numero 7 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>7. ¿Es familiar consanguíneo o por afinidad, hasta el 4° grado, de alguna persona que ostente el cargo de Vocal de la Junta Local o Distrital Ejecutiva o del Consejo Local o Distrital INE o de órganos ejecutivos y directivos del OPL (Consejeras/os y representantes de partido político o, en su caso, candidatas/os independientes que ya estén registradas/os para el PE 2023-2024)?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p7_familiar"
                               id="p7_familiar"
                               name="p7_familiar">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p7_familiar"
                               id="p7_familiar"
                               name="p7_familiar">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p7_familiar')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- Prgeunta numero 8 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>8. ¿Es o ha sido persona servidora pública vinculada con programas sociales en el gobierno municipal, estatal o federal, persona operadora de programas sociales y actividades institucionales, cualquiera que sea su denominación, persona servidora de la nación o ha ostentado alguno de estos cargos en el último año previo a este registro para el PE 2023-2024? **</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               wire:model="p8_servidora"
                               id="p8_servidora"
                               name="p8_servidora">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               wire:model="p8_servidora"
                               id="p8_servidora"
                               name="p8_servidora">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-12">
                    @error('p8_servidora')<span class="text-danger error h6">{{ $message }}</span>@enderror
                </div>
            </div>
            {{-- Prgeunta numero 9 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>9. ¿Cuenta con experiencia en manejo o trato con grupos?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p9_experiencia"
                               name="p9_experiencia">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p9_experiencia"
                               name="p9_experiencia">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 10 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>10. ¿Ha impartido capacitación presencial o virtual?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p10_impartido"
                               name="p10_impartido">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p10_impartido"
                               name="p10_impartido">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 11 --}}
            <div class="form-row">
                <div class="col-12"><h5>11. ¿Habla alguna lengua indígena?</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p11_habla_lindigena"
                               name="p11_habla_lindigena">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p11_habla_lindigena"
                               name="p11_habla_lindigena">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 11.1 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>11.1- Cual</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           id="p11_1_cual"
                           name="p11_1_cual">
                </div>
            </div>
            {{-- Prgeunta numero 12 --}}
            <div class="form-row">
                <div class="col-12"><h5>12. ¿Sabe conducir automóvil? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p12_conducir"
                               name="p12_conducir">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p12_conducir"
                               name="p12_conducir">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 12.1 --}}
            <div class="form-row">
                <div class="col-12"><h5>12.1. ¿Cuenta con licencia de manejo? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p12_1_licencia"
                               name="p12_1_licencia">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p12_1_licencia"
                               name="p12_1_licencia">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>

            {{-- Prgeunta numero 12.3 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>12.3. Anote marca y modelo*.</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           id="p12_3_marca"
                           name="p12_3_marca">
                </div>
            </div>
            {{-- Prgeunta numero 12.4 --}}
            <div class="form-row">
                <div class="col-12"><h5>12.4. ¿Está usted dispuesta/ o utilizar su vehículo para sus actividades si el OPL le brinda un apoyo económico para combustible? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p12_4_prestar"
                               name="p12_4_prestar">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p12_4_prestar"
                               name="p12_4_prestar">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 13 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>13. ¿Cuánto tiempo le lleva trasladarse de su domicilio al OPL? *</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           id="p13_tiempo_traslado"
                           name="p13_tiempo_traslado">
                </div>
            </div>
            {{-- Prgeunta numero 14 --}}
            <div class="form-row">
                <div class="col-12"><h5>14. ¿Cuenta con acceso a Internet en su casa? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p14_acceso_internet"
                               name="p14_acceso_internet">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p14_acceso_internet"
                               name="p14_acceso_internet">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 15 --}}
            <div class="form-row">
                <div class="col-12"><h5>15. ¿Tiene alguna discapacidad? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p15_discapacidad"
                               name="p15_discapacidad">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p15_discapacidad"
                               name="p15_discapacidad">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 15.1 --}}
            <div class="form-row">
                <div class="col-12"><h5>15.1 En caso de haber señalado “Sí” en la pregunta 15, selección una opción.</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="fisica_motora"
                               id="p15_1_tipodiscapacidad"
                               name="p15_1_tipodiscapacidad">
                        <label
                            class="form-check-label">A) Física o motora</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="intelectual"
                               id="p15_1_tipodiscapacidad"
                               name="p15_1_tipodiscapacidad">
                        <label
                            class="form-check-label">B) Intelectual</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="mental_psicosocial"
                               id="p15_1_tipodiscapacidad"
                               name="p15_1_tipodiscapacidad">
                        <label
                            class="form-check-label">C) Mental o psicosocial</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="sensorial"
                               id="p15_1_tipodiscapacidad"
                               name="p15_1_tipodiscapacidad">
                        <label
                            class="form-check-label">D) Sensorial</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 15.2 --}}
            <div class="form-row justify-content-between mb-3">
                <div class="col-12"><h5>15.2 Especifique:</h5></div>
                <div class="col-4">
                    <input type="text" class="form-control"
                           id="p15_2_otradiscapacidad"
                           name="p15_2_otradiscapacidad">
                </div>
            </div>
            {{-- Prgeunta numero 16 --}}
            <div class="form-row">
                <div class="col-12"><h5>16. ¿Sabe utilizar el teléfono celular? *</h5></div>
                <div class="col-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="Si"
                               id="p16_utilizar_celular"
                               name="p16_utilizar_celular">
                        <label
                            class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input"
                               value="No"
                               id="p16_utilizar_celular"
                               name="p16_utilizar_celular">
                        <label
                            class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            {{-- Prgeunta numero 12.4 --}}
        </div>
        <div class="card-footer d-flex flex-row justify-content-end">

            <button class="btn btn-primary" wire:click.prevent="guardar">
                <span wire:loading.remove>Guardar</span>
                <span wire:loading>Guardando información....</span>
            </button>
        </div>
    </div>
    @endif
    @if($this->registrado)
        <div class="card card-iepc-outline">
            <div class="card-header">
                <h4 class="card-title">Acuse de registro</h4>
            </div>
            <div class="card-body">
                <div class="col-12 text-center">
                    <p>Presente el siguiente acuse en las oficionas para el cotejo de su información</p>
                    <div class="btn-group-toggle">
                        <a class="btn btn-info btn-lg" href="/aspirante"  wire:loading.remove>
                            <i class="fa fa-plus-circle"></i> Nuevo registro
                        </a>
                        <a class="btn btn-iepc btn-lg" wire:click.prevent="generarFicha">
                            <span wire:loading.remove>Descargar acuse</span>
                            <span wire:loading>Generando acuse....</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    @endif
</div>
@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('confirmar', params => {
                Swal.fire({
                    icon:params.icon,
                    title:params.title,
                    html:params.text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:params.confirmText,
                    reverseButtons: true,
                    width:'50%'
                }).then(result => {
                    if (result.value) {
                    this.livewire.call(params.method)
                    }
                })
            })
        })
    </script>
@endsection
