@section('title', $candidato_id ? 'Actualizar registro' : 'Nuevo registro' )
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"></i> Candidaturas</h1>
        </div>
    </div>
@stop
<div class="card card-secondary">
    <div class="card-header">
        <h5 class="modal-title text-uppercase">{{ $candidato_id > 0 ? 'Actualizar' : 'Nuevo' }} candidato</h5>
    </div>
    <div class="card-body">
        <div class="card card-iepc-outline">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100" data-toggle="collapse" href="#seccion-general">
                        Datos generales
                    </a>
                </h4>
            </div>
            <div id="seccion-general" class="collapse show" wire:ignore.self>
                <div class="card-body">
                    <div class="form row">
                        <div class="col-3 col-md-3 col-sm-12">
                            <div class="form row">
                                <div class="col-12 text-center">
                                    <img style="height: 100px" src="{{ $this->uploadedFoto  ? 'data:image/jpeg;base64,'.$this->fotoBase64 : asset($this->foto ? $this->foto->temporaryUrl(): 'storage/perfil/default.png') }}"
                                         class="profile-user-img img-fluid img-rounded" alt="Imagen">
                                </div>
                                <div class="col-12 text-center">
                                    <div class="form-group">
                                        <label class="d-inline-block"><span class="text-danger">* </span></label>
                                        <input wire:model='foto' type="file" class="form-control" name="foto">
                                    </div>
                                    @error('foto')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-9 col-sm-12">
                            <div class="form row">
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
                                        <label class=""><span class="text-danger ">*</span> Nombre</label>
                                        <input wire:model.defer="nombre" type="text" class="form-control " id="area"
                                               name="area"/>
                                    </div>
                                    @error('nombre')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-4 col-md-4 col-sm-12">
                                    <div class="form-group" wire:ignore>
                                        <label class=""><span class="text-danger ">*</span> Primero apellido</label>
                                        <input wire:model.defer="apellido1" type="text" class="form-control " id="area"
                                               name="area"/>
                                    </div>
                                    @error('apellido1')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-4 col-md-4 col-sm-12">
                                    <div class="form-group" wire:ignore>
                                        <label class=""><span class="text-danger ">*</span> Segundo apellido</label>
                                        <input wire:model.defer="apellido2" type="text" class="form-control " id="area"
                                               name="area"/>
                                    </div>
                                    @error('apellido2')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-4 col-md-4 col-sm-12">
                                    <div class="form-group" wire:ignore>
                                        <label class=""><span class="text-danger ">*</span> Cargo</label>
                                        <select wire:model.defer="cargo" class="form-control">
                                            <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                            @foreach ($this->cargos as $cargo)
                                                <option value="{{$cargo}}"
                                                        wire:key="grado-{{ $cargo }}">{{ $cargo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('cargo')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-4 col-md-4 col-sm-12">
                                    <div class="form-group" wire:ignore>
                                        <label class=""><span class="text-danger ">*</span> Edad</label>
                                        <input wire:model.defer="edad" type="number" class="form-control "/>
                                    </div>
                                    @error('edad')<span class="text-danger error h6">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="col-3 col-md-3 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Sexo</label>
                                <select wire:model.defer="sexo" class="form-control">
                                    <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                    @foreach ($this->sexos as $sexo)
                                        <option value="{{ $sexo }}" wire:key="sexo-{{ $sexo }}">{{ $sexo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sexo')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-3 col-md-3 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Distrito</label>
                                <select wire:model.defer="distrito" class="form-control">
                                    <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                    @foreach ($this->distritos as $distrito)
                                        <option value="{{ $distrito }}"
                                                wire:key="distrito-{{ $distrito }}">{{ $distrito }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sexo')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-3 col-md-3 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Tipo candidatura</label>
                                <select wire:model.defer="tipo_candidatura" class="form-control">
                                    <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                    @foreach ($this->tiposCandidatura as $tipoCandidatura)
                                        <option value="{{ $tipoCandidatura }}"
                                                wire:key="tipo-candidatura-{{ $tipoCandidatura }}">{{ $tipoCandidatura }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('tipo_candidatura')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-3 col-md-3 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Partido,Coalicion o
                                    Candidatura</label>
                                <select wire:model.defer="partido" class="form-control">
                                    <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                    @foreach ($this->partidos as $partido)
                                        <option value="{{ $partido['sigla'] }}"
                                                wire:key="partido-{{ $partido['sigla'] }}">{{ $partido['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('partido')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> ¿Por qué quiero ocupar un cargo
                                    público?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'porque_desea_el_cargo')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <textarea wire:model.defer="porque_desea_el_cargo" type="text"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            @error('porque_desea_el_cargo')<span
                                class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Propuesta 1</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'propuesta1')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <textarea wire:model.defer="propuesta1" type="text"
                                              class="form-control "></textarea>
                                </div>

                            </div>
                            @error('propuesta1')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Propuesta 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'propuesta2')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <textarea wire:model.defer="propuesta2" type="text"
                                              class="form-control "></textarea>
                                </div>

                            </div>
                            @error('propuesta2')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Propuesta en materia de género o del
                                    grupo en situación de discriminación que representa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'propuesta_gen_disc')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <textarea wire:model.defer="propuesta_gen_disc" type="text"
                                              class="form-control "></textarea>
                                </div>

                            </div>
                            @error('propuesta_gen_disc')<span
                                class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                    <th colspan="3"><span class="text-danger">* </span>Medios de contacto
                                        <button class="btn btn-sm btn-success" wire:click="agregarMedio()"><i
                                                class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($medios_contacto) > 0)
                                    @foreach($medios_contacto as $kmedio => $medio)
                                        <tr>
                                            <td>
                                                <select wire:model.defer="medios_contacto.{{ $kmedio }}.tipo"
                                                        class="form-control" wire:key="medio-contacto-{{ $kmedio }}"
                                                        name="tipo_medio_{{$kmedio}}">
                                                    <option
                                                        value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                                    @foreach ($tiposDeMedio as $key => $tipoMedio)
                                                        <option value="{{$tipoMedio}}"
                                                                @if($tipoMedio === $medio['tipo'])selected="selected"
                                                                @endif wire:key="tipo-contacto-{{ $key }}">{{ $tipoMedio }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group" wire:ignore>
                                                    <input wire:model.defer="medios_contacto.{{ $kmedio }}.texto"
                                                           type="text" class="form-control input-sm "/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-danger"
                                                            wire:click="eliminarMedio({{$kmedio}})"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se ha capturado medios de contacto.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            @error('medios_contacto')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-iepc-outline">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100" data-toggle="collapse" href="#seccion-curricular">
                        Cuestionario curricular
                    </a>
                </h4>
            </div>
            <div id="seccion-curricular" class="collapse show" wire:ignore.self>
                <div class="card-body">
                    <div class="form row">
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Maximo grado de estudios</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'porque_desea_el_cargo')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <select wire:model.defer="maximo_estudio" class="form-control">
                                        <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                        @foreach ($this->grados as $grado)
                                            <option value="{{ $grado}}"
                                                    wire:key="grado-{{ $grado }}">{{ $grado }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            @error('maximo_estudio')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="form-group" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Estatus Maximo grado de
                                    estudios</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span title="Agregar observación" class="input-group-text text-warning"
                                              wire:click.prevent="$emitTo('candidatos.observacion', 'open',{{ $candidato_id }},'porque_desea_el_cargo')">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <select wire:model.defer="maximo_estudio_estatus" class="form-control">
                                        <option value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                        @foreach ($estatusGrados as $key => $estatusGrado)
                                            <option value="{{$estatusGrado}}"
                                                    wire:key="estatus-grado-{{ $key }}">{{ $estatusGrado }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            @error('maximo_estudio_estatus')<span
                                class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th colspan="2"><span class="text-danger"></span>Otras formaciones academicas
                                        <button class="btn btn-sm btn-success" wire:click="agregarFormacion()"><i
                                                class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($otra_formacion) > 0)
                                    @foreach($otra_formacion as $kformacion => $formacion)
                                        <tr>
                                            <td>
                                                <textarea class="form-control" maxlength="250"
                                                          wire:model.defer="otra_formacion.{{$kformacion}}.descripcion"></textarea>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-danger"
                                                            wire:click="eliminarFormacion({{$kformacion}})"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No se capturaron otras formaciones academicas.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            @error('otra_formacion')<span class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-1" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Trayectoria política y/o
                                    participación social</label>
                                <textarea wire:model.defer="historia_profesional" class="form-control" minlength="2000"
                                          maxlength="5000"></textarea>
                            </div>
                            @error('candidato.historia_profesional')<span
                                class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-1" wire:ignore>
                                <label class=""><span class="text-danger ">*</span> Historia profesional y/o
                                    laboral</label>
                                <textarea wire:model.defer="trayectoria_politica" class="form-control" minlength="2000"
                                          maxlength="5000"></textarea>
                            </div>
                            @error('candidato.trayectoria_politica')<span
                                class="text-danger error h6">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-iepc-outline">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100" data-toggle="collapse" href="#seccion-identidad">
                        Cuestionario de identidad
                    </a>
                </h4>
            </div>
            <div id="seccion-identidad" class="collapse show" wire:ignore.self>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            @foreach($cuestionarios as $kcuestionario => $cuestionario)
                                <div class="callout callout-info">
                                    <h4 class="text-bold">{{ $cuestionario['titulo'] }}</h4>
                                    <div class="form row">
                                        @foreach($cuestionario['preguntas'] as $kpregunta => $pregunta)
                                            <div class="col-12">
                                                <h5>{{ $pregunta['texto'] }}</h5>
                                                @foreach($pregunta['opciones'] as $kopcion => $opcion)
                                                    @if($kopcion === 'select')
                                                        <select class="form-control"
                                                                wire:model="respuestas.respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}"
                                                                id="respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}"
                                                                name="respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}">
                                                            <option
                                                                value="">{{ __('adminlte::adminlte.please_select') }}</option>
                                                            @foreach($this->$opcion as $subopcion)
                                                                <option value="{{$subopcion}}">{{$subopcion}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else

                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                   wire:model="respuestas.respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}"
                                                                   value="{{ is_array($opcion) ? $kopcion : $opcion }}"
                                                                   id="respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}"
                                                                   name="respuesta-{{$cuestionario['clave']}}-{{ $kpregunta }}">
                                                            <label
                                                                class="form-check-label">{{ is_array($opcion) ? $kopcion.(strlen($opcion['subtexto']) ? '. '.$opcion['subtexto'] : '') : $opcion }}</label>
                                                            @if(is_array($opcion))
                                                                <ul class="list">
                                                                    @foreach($opcion['subopciones'] as $subopcion)
                                                                        <li class="item">{{$subopcion}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @error("respuestas.respuesta-{$cuestionario['clave']}-{$kpregunta}")<span
                                                class="text-danger error h6">{{ $message }}</span>@enderror
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href='{{ url()->previous() }}' type="button" class="btn btn-danger " title="Regresar">
            Regresar
        </a>
        <button class="btn btn-primary" wire:click.prevent=@if($candidato_id > 0)"handlerSave()"@else
            "guardar()"
        @endif>Guardar</button>
    </div>
</div>

<div id="modal-observacion" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
     data-keyboard="false">
    <livewire:aspirantes.observacion/>
</div>

@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('confirmar', params => {
                Swal.fire({
                    icon:params.icon,
                    title:params.title,
                    html:params.text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:params.confirmText,
                    reverseButtons: true,
                    width:'80%'
                }).then(result => {
                    if (result.value) {
                    @this.call(params.method)
                    }
                })
            })
        })
    </script>
@endsection
