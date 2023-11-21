@section('title', 'Nuevo registro')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="xtitulox"><i class="fa fa-users text-secondary"> Registro de aspirantes</i></h1>
        </div>
    </div>
@stop
<div class="card card-secondary">

    <div class="card-body">
        {{-- SECCION UNO --}}
        <div class="form-row">
            <div class="col-4 col-md-4 col-sm-12">
                <div class="form-group" wire:ignore>
                    <label class=""><span class="text-danger "></span> Fecha de recepción</label>
                    <input id="fecha_recepcion" type="text" value="{{ date('d/m/Y') }}"
                           class="form-control" disabled/>
                </div>
                @error('fecha_recepcion')<span class="text-danger error h6">{{ $message }}</span>@enderror
            </div>
            <div class="col-4 col-md-4 col-sm-12">
                <div class="form-group" wire:ignore>
                    <label class=""><span class="text-danger "></span> Num. de convocatoria</label>
                    <input wire:model.defer="numero_convocatoria"
                           id="numero_convocatoria"
                           type="number"
                           class="form-control"
                           disabled/>
                </div>
                @error('numero_convocatoria')<span class="text-danger error h6">{{ $message }}</span>@enderror
            </div>
            <div class="col-4 col-md-4 col-sm-12">
                <div class="form-group" wire:ignore>
                    <label class=""><span class="text-danger "></span> Folio de la persona aspirante</label>
                    <input wire:model.defer="folio_aspirante" id="folio_aspirante"
                           type="text"
                           class="form-control"
                           disabled />
                </div>
                @error('folio_aspirante')<span class="text-danger error h6">{{ $message }}</span>@enderror
            </div>
            <div class="col-4 col-md-4 col-sm-12">
                <div class="form-group" wire:ignore>
                    <label class=""><span class="text-danger ">*</span> Entidad</label>
                    <select class="form-control"
                            id="entidad"
                            name="entidad"
                            wire:model.defer="entidad">
                        <option
                            value="">{{ __('adminlte::adminlte.please_select') }}</option>
                        @foreach($this->entidades as $entidad)
                            <option value="{{$entidad}}">{{$entidad}}</option>
                        @endforeach
                    </select>
                </div>
                @error('entidad')<span class="text-danger error h6">{{ $message }}</span>@enderror
            </div>
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
                    <input wire:model.defer="sede" id="sede" type="text" class="form-control "/>
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
            <div class="col-12">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th colspan="2"><span class="text-danger"></span> Experiencia
                            <button class="btn btn-xs btn-success"
                                    wire:click="agregarFormacion()"><i
                                    class="fa fa-plus"></i></button>
                        </th>
                    </tr>
                    <tr>
                        <th>Nombre de la empresa o institución</th>
                        <th>Puesto</th>
                        <th>Periodo en que laboro</th>
                        <th>Telefono</th>
                        <th></th>
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
                                           type="text"
                                           wire:model.defer="experiencia_laboral.{{$kexperiencia}}.periodo" />
                                </td>
                                <td>
                                    <input class="form-control"
                                           type="text"
                                           wire:model.defer="experiencia_laboral.{{$kexperiencia}}.telefono" />
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-danger"
                                                wire:click="eliminarFormacion({{$kexperiencia}})"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No se encontraron experiencicas capturadas.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                @error('otra_formacion')<span class="text-danger error h6">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <h3>Otros datos</h3>
            </div>
            <div class="col-12 dropdown-divider">
            </div>
            <div class="col-12"><h5>1- ¿ Has participado en proceso electoral ?</h5></div>
            <div class="col-4">
                <div class="form-check">
                    <input type="radio" class="form-check-input"
                           value="Si"
                           id="respuesta-p1_proceso_electoral"
                           name="respuesta-p1_proceso_electoral">
                    <label
                        class="form-check-label">Si</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"
                           value="No"
                           id="respuesta-p1_proceso_electoral"
                           name="respuesta-p1_proceso_electoral">
                    <label
                        class="form-check-label">Si</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12"><h5>1.1- Cual</h5></div>
            <div class="col-4">
                <input type="text" class="form-control"
                       id="respuesta-p1_proceso_electorals"
                       name="respuesta-p1_proceso_electorals">
            </div>
        </div>
        <div class="form-row">
            <div class="col-12"><h5>1.2- De que forma</h5></div>
            <div class="col-4">
                <input type="text" class="form-control"
                       id="respuesta-p1_proceso_electorals"
                       name="respuesta-p1_proceso_electorals">
            </div>
        </div>
    </div>
    <div class="card-footer d-flex flex-row justify-content-end">
        <button class="btn btn-primary" wire:click.prevent="guardar">
            <span wire:loading.remove>Guardar</span>
            <span wire:loading>Guardando información....</span>
        </button>
    </div>
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
                    width:'50%'
                }).then(result => {
                    if (result.value) {
                    @this.call(params.method)
                    }
                })
            })
        })
    </script>
@endsection
