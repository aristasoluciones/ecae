@section('title', 'Nuevo registro')
@section('content_header')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12" style="text-align: justify">
                <h1 class="xtitulox"><i class="fa fa-users text-secondary"> REGISTRO DE ASPIRANTES DE PERSONAS SUPERVISORAS ELECTORALES LOCALES O CAPACITADORAS ASISTENTES ELECTORALES LOCALES DURANTE EL PROCESO ELECTORAL LOCAL ORDINARIO 2024</i></h1>
            </div>
        </div>
    </div>
@stop
@push('css')
<style>
    input[type=time]::-webkit-datetime-edit-ampm-field {
        display: none;
    }
    select,textarea,input[type="email"],input[type="text"] {
         text-transform: uppercase;
     }
    .otro-dato h5 {
        text-align: justify;
    }

</style>
@endpush
<div class="container">
    @if (!$this->registrado)
        <div class="card card-secondary">
            <div class="card-body p-5">
                {{-- SECCION UNO --}}
                <div class="form-row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <p><sup class="text-bold text-danger">*</sup> <small class="text-justify">Los campos son obligatorios</small></p>
                            <p><sup class="text-bold">1</sup> <small class="text-justify">No contar con estos documentos no será causa de exclusión en este momento. En caso de ser contratado/a será obligatorio.</small></p>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Municipio</label>
                            <select class="form-control {{ $errors->has('municipio') ? 'is-invalid' : '' }}"
                                id="municipio" name="municipio" wire:model.lazy="municipio">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->municipios as $municipio)
                                    <option value="{{ $municipio }}">{{ $municipio }}
                                    </option>
                                @endforeach
                            </select>
                            @error('municipio')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> Localidad</label>
                            <select class="form-control {{ $errors->has('localidad') ? 'is-invalid' : '' }}"
                                id="localidad" name="localidad" wire:model.lazy="localidad">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($localidadesFiltrado as $loc)
                                    <option value="{{ $loc }}">{{ $loc }}</option>
                                @endforeach
                            </select>
                            @error('localidad')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Sede</label>
                            <select class="form-control {{ $errors->has('sede') ? 'is-invalid' : '' }}" id="sede"
                                name="sede" wire:model.lazy="sede">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->consejosMunicipales as $cons)
                                    <option value="{{ $cons }}">{{ $cons }}</option>
                                @endforeach
                            </select>
                            @error('sede')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> Tipo
                                de sede</label>
                            <select class="form-control {{ $errors->has('tipo_sede') ? 'is-invalid' : '' }}"
                                id="tipo_sede" name="tipo_sede" wire:model.lazy="tipo_sede">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                <option value="Fija">FIJA</option>
                                <option value="Alterna">ALTERNA</option>
                            </select>
                            @error('tipo_sede')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger"></span> Correo electrónico</label>
                            <input wire:model.lazy="email" id="email" name="email" type="email"
                                   aria-describedby="clave-elector-help-text"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                                   
                            @error('email')
                            <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                           
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger "></span> Confirmar correo electrónico</label> 
                            <input wire:model.lazy="email_confirmation" id="email_confirmation" name="email_confirmation" type="email"
                                   class="form-control {{ $errors->has('email_confirmation') ? 'is-invalid' : '' }}" />
                                  
                                     @error('email_confirmation')
                                     <span class="text-danger error h6">{{ $message }}</span>
                                    @enderror
                            </div>                            
                    </div>
                </div>
<script>
    var email01, email02;

email01 = document.getElementById('email');
email02 = document.getElementById('email_confirmation');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Los correos no coinciden');
    else
        password2.setCustomValidity('');
}
</script>
                {{-- SECCION DOS --}}
                <div class="form-row">
                    <div class="col-12 divider">
                        <h3 class="dropdown-divider"></h3>
                    </div>
                    <div class="row">
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class=""><span class="text-danger ">*</span>
                                    Clave de elector o FUAR</label>
                                <input wire:model.lazy="clave_elector" id="clave_elector" type="text"
                                    aria-describedby="clave-elector-help-text"
                                    class="form-control {{ $errors->has('clave_elector') ? 'is-invalid' : '' }}" />
                                <small id="clave-elector-help-text" class="form-text text-muted">Ingrese la <strong
                                        class="text-uppercase">clave de
                                        elector</strong> tal como aparece en su INE
                                    sin espacios y sin guiones</small>
                                @error('clave_elector')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class=""><span class="text-danger ">*</span>Sección
                                    electoral</label>
                                <input maxlength="4" wire:model.lazy="seccion_electoral" id="seccion_electoral"
                                    type="text"
                                    class="form-control  {{ $errors->has('seccion_electoral') ? 'is-invalid' : '' }}" />
                                <small style="font-size:0.6em" id="clave-elector-help-text"
                                    class="form-text text-muted">Ingrese los 4
                                    digitos de la <strong>SECCION</strong> tal como
                                    aparece en su INE</small>
                                @error('seccion_electoral')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class=""><sup>1</sup> RFC</label>
                                <input maxlength="10" wire:model.lazy="rfc" id="rfc" type="text"
                                    class="form-control {{ $errors->has('rfc') ? 'is-invalid' : '' }}" />
                                @error('rfc')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class=""><sup>1</sup>Homoclave</label>
                                <input maxlength="3" wire:model.lazy="homoclave" id="homoclave" type="text"
                                    class="form-control {{ $errors->has('rfc') ? 'is-invalid' : '' }}" />
                                @error('homoclave')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><sup>1</sup> CURP</label>
                            <input wire:model.lazy="curp" id="curp" name="curp" type="text"
                                class="form-control {{ $errors->has('curp') ? 'is-invalid' : '' }}" />
                            @error('curp')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Nombre(s)</label>
                            <input wire:model.lazy="nombre" id="nombre" name="nombre" type="text"
                                class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" />
                            @error('nombre')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Primer Apellido</label>
                            <input wire:model.lazy="apellido1" id="apellido1" name="apellido1" type="text"
                                class="form-control {{ $errors->has('apellido1') ? 'is-invalid' : '' }}" />
                            @error('apellido1')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Segundo Apellido</label>
                            <input wire:model.lazy="apellido2" id="apellido2" name="apellido2" type="text"
                                class="form-control {{ $errors->has('apellido2') ? 'is-invalid' : '' }}" />
                            @error('apellido2')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Fecha nacimiento</label>
                            <input wire:model.lazy="fecha_nacimiento" readonly id="fecha_nacimiento"
                                name="fecha_nacimiento" type="text" class="form-control" />
                            @error('fecha_nacimiento')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Edad</label>
                            <input wire:model.lazy="edad" readonly id="edad" name="edad" type="text"
                                class="form-control" />
                            @error('edad')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>Género</label>
                            <select wire:model.lazy="genero"
                                class="form-control {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->sexos as $sexo)
                                    <option value="{{ $sexo }}" wire:key="sexo-{{ $sexo }}">
                                        {{ $sexo }}</option>
                                @endforeach
                            </select>
                            @error('genero')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($genero === 'Otro')
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                                <label class=""><span class="text-danger ">*</span>Especifique:</label>
                                <input wire:model.lazy="otro_genero"
                                    class="form-control {{ $errors->has('otro_genero') ? 'is-invalid' : '' }}">
                                @error('otro_genero')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="col-6 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> ¿Se identifica como una persona LGBTTTIQ+?</label>
                            <select wire:model.lazy="persona_lgbtttiq"
                                class="form-control {{ $errors->has('persona_lgbtttiq') ? 'is-invalid' : '' }}">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                                <option value="Otro">Otro</option>
                                <option value="Prefiero no decir">Prefiero no decir
                                </option>
                            </select>
                            @error('persona_lgbtttiq')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($persona_lgbtttiq === 'Otro')
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('otro_lgbtttiq') ? 'is-invalid' : '' }}">
                                <label class=""><span class="text-danger ">*</span>
                                    Especifique</label>
                                <input wire:model.lazy="otro_lgbtttiq"
                                    class="form-control {{ $errors->has('otro_lgbtttiq') ? 'is-invalid' : '' }}">
                                @error('otro_lgbtttiq')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="col-12 divider">
                        <h4 class="text-bold">Domicilio</h4>
                        <h3 class="dropdown-divider"></h3>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Calle</label>
                            <input wire:model.lazy="dom_calle" id="dom_calle" name="dom_calle" type="text"
                                class="form-control {{ $errors->has('dom_calle') ? 'is-invalid' : '' }}" />
                            @error('dom_calle')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Número exterior</label>
                            <input wire:model.lazy="dom_num_exterior" id="dom_num_exterior" name="dom_num_exterior"
                                type="text"
                                class="form-control {{ $errors->has('dom_num_exterior') ? 'is-invalid' : '' }}" />
                            @error('dom_num_exterior')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger"></span> Número
                                interior</label>
                            <input wire:model.lazy="dom_num_interior" id="dom_num_interior" name="dom_num_interior"
                                type="text"
                                class="form-control {{ $errors->has('dom_num_interior') ? 'is-invalid' : '' }}" />
                            @error('dom_num_interior')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Colonia</label>
                            <input wire:model.lazy="dom_colonia" id="dom_colonia" type="text"
                                class="form-control {{ $errors->has('dom_colonia') ? 'is-invalid' : '' }}" />
                            @error('dom_colonia')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>Municipio</label>
                            <select wire:model.lazy="dom_municipio"
                                class="form-control {{ $errors->has('dom_municipio') ? 'is-invalid' : '' }}">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->municipios as $municipio)
                                    <option value="{{ $municipio }}" wire:key="municipio-{{ $municipio }}">
                                        {{ $municipio }}</option>
                                @endforeach
                            </select>
                            @error('dom_municipio')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Localidad</label>
                            <input wire:model.lazy="dom_localidad" id="dom_localidad" type="text"
                                class="form-control {{ $errors->has('dom_localidad') ? 'is-invalid' : '' }}" />
                            @error('dom_localidad')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>Código
                                Postal</label>
                            <input wire:model.lazy="dom_postal" id="dom_postal" type="text" maxlength="5" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                                class="form-control {{ $errors->has('dom_postal') ? 'is-invalid' : '' }}" />
                            @error('dom_postal')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger "></span>
                                Teléfono fijo</label>
                            <input wire:model.lazy="tel_fijo" id="tel_fijo" type="text" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                                class="form-control {{ $errors->has('tel_fijo') ? 'is-invalid' : '' }}" />
                            @error('tel_fijo')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger "></span>
                                Teléfono celular</label>
                            <input wire:model.lazy="tel_celular" id="tel_celular" type="text" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                                class="form-control {{ $errors->has('tel_celular') ? 'is-invalid' : '' }}" />
                            @error('tel_celular')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- SECCION TRES --}}

                <div class="form-row">
                    <div class="col-12 dropdown-divider"></div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span> Último grado de
                                estudios.</label>
                            <select wire:model.lazy="ultimo_grado_estudio"
                                class="form-control {{ $errors->has('ultimo_grado_estudio') ? 'is-invalid' : '' }}">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->grados as $grado)
                                    <option value="{{ $grado }}" wire:key="grado-{{ $grado }}">
                                        {{ $grado }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ultimo_grado_estudio')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if ($ultimo_grado_estudio === 'Carrera (especifique)')
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="form-group {{ $errors->has('carrera') ? 'is-invalid' : '' }}">
                                <label class=""><span class="text-danger ">*</span>Especifique:</label>
                                <input wire:model.lazy="carrera"
                                    class="form-control {{ $errors->has('carrera') ? 'is-invalid' : '' }}">
                                @error('carrera')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif


                    <div class="col-6 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger "></span>
                                ¿Realiza estudios actualmente? Especifique:</label>
                            <input wire:model.lazy="realiza_estudios" id="realiza_estudios" type="text"
                                class="form-control {{ $errors->has('realiza_estudios') ? 'is-invalid' : '' }}" />
                            @error('realiza_estudios')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger ">*</span>
                                Medio por el que se enteró de la
                                convocatoria</label>
                            <select wire:model.lazy="medio_convocatoria"
                                class="form-control {{ $errors->has('medio_convocatoria') ? 'is-invalid' : '' }}">
                                <option value="">
                                    {{ __('adminlte::adminlte.please_select') }}
                                </option>
                                @foreach ($this->tiposDeMedio as $tipos_de_medio)
                                    <option value="{{ $tipos_de_medio }}"
                                        wire:key="tipos-de-medio{{ $tipos_de_medio }}">
                                        {{ $tipos_de_medio }}</option>
                                @endforeach
                            </select>
                            @error('medio_convocatoria')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label class=""><span class="text-danger "></span> ¿Cual
                                es el motivo por el que quiere participar como SE o
                                CAE Local? Especifique:</label>
                            <textarea maxlength="250" wire:model.lazy="motivo_secae" rows="2" id="motivo_secae"
                                class="form-control {{ $errors->has('motivo_secae') ? 'is-invalid' : '' }}"></textarea>
                            @error('motivo_secae')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center"><span
                                            class="text-danger"></span>Experiencia
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-center text-gray">
                                        (Señale los tres últimos empleos o
                                        prestaciones de servicios. El no contar con
                                        experiencia no será causa de exclusión)</th>
                                </tr>
                                <tr>
                                    <th>Nombre de la empresa o institución</th>
                                    <th>Puesto</th>
                                    <th colspan="2">
                                        <div class="row">
                                            <div class="col-12">Periodo en que
                                                laboró</div>
                                            <div class="col-6">Fecha inicio</div>
                                            <div class="col-6">Fecha final</div>
                                        </div>
                                    </th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($experiencia_laboral) > 0)
                                    @foreach ($experiencia_laboral as $kexperiencia => $experiencia)
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text"
                                                    wire:model.lazy="experiencia_laboral.{{ $kexperiencia }}.nombre" />
                                            </td>
                                            <td>
                                                <input class="form-control" type="text"
                                                    wire:model.lazy="experiencia_laboral.{{ $kexperiencia }}.puesto" />
                                            </td>
                                            <td>
                                                <input class="form-control" type="date"
                                                    wire:model.lazy="experiencia_laboral.{{ $kexperiencia }}.inicio" />
                                            </td>
                                            <td>
                                                <input class="form-control" type="date"
                                                    wire:model.lazy="experiencia_laboral.{{ $kexperiencia }}.fin" />
                                            </td>
                                            <td>
                                                <input class="form-control" type="text"
                                                    wire:model.lazy="experiencia_laboral.{{ $kexperiencia }}.telefono" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @error('experiencia_laboral')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 dropdown-divider"></div>
                    <div class="col-12"><h3 class="text-bold">Otros datos</h3></div>
                    <div class="col-12">
                        <div class="callout callout-info">
                            <p>
                                <sup class="text-bold">*</sup> <small class="text-bold text-justify"> LAS PREGUNTAS DE LA 11 A LA 15 SOLAMENTE SON INFORMATIVAS Y NO SON MOTIVO DE EXCLUSIÓN.</small>
                            </p>
                            <p>
                                <sup>**</sup><small class="text-justify"> En cumplimiento al acuerdo INE/CG535/2023 por el que se emiten los Lineamientos en acatamiento a la sentencia dictada por la sala superior del TEPJF en el expediente SUP-RAP-04/2023 y acumulados, que establecen medidas preventivas para evitar la injerencia y/o participación de personas servidoras públicas que manejan programas sociales en el Proceso Electoral Federal y los Procesos Electorales Locales 2023-2024, en la Jornada Electoral.</small>
                            </p>
                        </div>

                    </div>

                    {{-- Pregunta numero 1 --}}

                    <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12"><h5>1- ¿Has participado en algún proceso electoral?</h5></div>
                        <div class="col-12">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="Si"
                                    wire:model.lazy="p1_proceso_electoral" id="p1_proceso_electoral_si"
                                    name="p1_proceso_electoral" />
                                <label for="p1_proceso_electoral_si" class="form-check-label">Si</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="No"
                                    wire:model.lazy="p1_proceso_electoral" id="p1_proceso_electoral_no"
                                    name="p1_proceso_electoral">
                                <label for="p1_proceso_electoral_no" class="form-check-label">No</label>
                            </div>
                        </div>

                        <div class="col-12">
                            @error('p1_proceso_electoral')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($p1_proceso_electoral === 'Si')
                            {{-- Pregunta numero 1.1 --}}
                            <div class="form-row justify-content-between mb-3 col-12">
                                <div class="col-12"><h5>1.1- ¿Cuál?</h5></div>
                                <div class="col-4">
                                    <input type="text" class="form-control" wire:model.lazy="p1_1_cual"
                                        id="p1_1_cual" name="p1_1_cual">
                                </div>
                                <div class="">
                                    @error('p1_1_cual')
                                        <span class="text-danger error h6">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        {{-- Pregunta numero 1.2 --}}

                        @if ($p1_proceso_electoral === 'Si')
                        <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12"><label class=""><span class="text-danger ">*</span>1.2- ¿De qué forma?</label>

                                <select wire:model.lazy="p1_2_forma"
                                    class="form-control col-4 {{ $errors->has('p1_2_forma') ? 'is-invalid' : '' }}">
                                    <option value="">
                                        {{ __('adminlte::adminlte.please_select') }}
                                    </option>
                                    <option value="SE">SE</option>
                                    <option value="CAE">CAE</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('p1_2_forma')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @endif

                        @if ($p1_2_forma === 'Otro')
                        <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12">
                                <div class="form-group">
                                    <label class="col-12"><span class="text-danger ">*</span>
                                        Especifique</label>
                                    <input wire:model.lazy="p1_2_otra_forma"
                                        class="form-control col-4 {{ $errors->has('p1_2_otra_forma') ? 'is-invalid' : '' }}">
                                    @error('p1_2_otra_forma')
                                        <span class="text-danger error h6">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        @endif
                    </div>

                {{-- Pregunta numero 2 --}}
                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>2- ¿Tiene disponibilidad de tiempo para prestar sus
                            servicios en horario fuera de lo habitual?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p2_disponibilidad" id="p2_disponibilidad_si"
                                name="p2_disponibilidad">
                            <label for="p2_disponibilidad_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p2_disponibilidad" id="p2_disponibilidad_no"
                                name="p2_disponibilidad">
                            <label for="p2_disponibilidad_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p2_disponibilidad')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Pregunta numero 3 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>3. ¿Está dispuesta/o a prestar sus servicios en
                            fines de semana y días festivos?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p3_finsemana" id="p3_finsemana_si" name="p3_finsemana">
                            <label for="p3_finsemana_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p3_finsemana" id="p3_finsemana_no" name="p3_finsemana">
                            <label for="p3_finsemana_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p3_finsemana')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 4 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>4. ¿Está dispuesta/o a realizar actividades de
                            campo? (visitar a la ciudadanía casa por casa,
                            trasladarse grandes distancias, entre otras)</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si" wire:model.lazy="p4_campo"
                                id="p4_campo_si" name="p4_campo">
                            <label for="p4_campo_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No" wire:model.lazy="p4_campo"
                                id="p4_campo_no" name="p4_campo">
                            <label for="p4_campo_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p4_campo')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Pregunta numero 5 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>5. ¿Milita en algún partido político u organización
                            política o ha participado activamente en alguna
                            campaña electoral en el último año?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p5_milita" id="p5_milita_si" name="p5_milita">
                            <label for="p5_milita_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p5_milita" id="p5_milita_no" name="p5_milita">
                            <label for="p5_milita_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p5_milita')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 6 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>6. ¿Ha participado como representante de partido
                            político con registro vigente, candidatura
                            independiente registrada en el PE 2023-2024 o
                            coalición en alguna elección realizada en los
                            últimos tres años?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p6_como_representante" id="p6_como_representante_si"
                                name="p6_como_representante">
                            <label for="p6_como_representante_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p6_como_representante" id="p6_como_representante_no"
                                name="p6_como_representante">
                            <label for="p6_como_representante_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p6_como_representante')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 7 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>7. ¿Es familiar consanguíneo o por afinidad, hasta
                            el 4° grado, de alguna persona que ostente el cargo
                            de Vocal de la Junta Local o Distrital Ejecutiva o
                            del Consejo Local o Distrital INE o de órganos
                            ejecutivos y directivos del OPL (Consejeras/os y
                            representantes de partido político o, en su caso,
                            candidatas/os independientes que ya estén
                            registradas/os para el PE 2023-2024)?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p7_familiar" id="p7_familiar_si" name="p7_familiar">
                            <label for="p7_familiar_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p7_familiar" id="p7_familiar_no" name="p7_familiar">
                            <label for="p7_familiar_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p7_familiar')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 8 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>8. ¿Es o ha sido persona servidora pública vinculada
                            con programas sociales en el gobierno municipal,
                            estatal o federal, persona operadora de programas
                            sociales y actividades institucionales, cualquiera
                            que sea su denominación, persona servidora de la
                            nación o ha ostentado alguno de estos cargos en el
                            último año previo a este registro para el PE
                            2023-2024? **</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p8_servidora" id="p8_servidora_si" name="p8_servidora">
                            <label for="p8_servidora_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p8_servidora" id="p8_servidora_no" name="p8_servidora">
                            <label for="p8_servidora_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p8_servidora')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 9 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>9. ¿Cuenta con experiencia en manejo o trato con
                            grupos?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p9_experiencia" id="p9_experiencia_si" name="p9_experiencia">
                            <label for="p9_experiencia_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p9_experiencia" id="p9_experiencia_no" name="p9_experiencia">
                            <label for="p9_experiencia_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p9_experiencia')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 10 --}}
                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>10. ¿Ha impartido capacitación presencial o virtual?
                        </h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p10_impartido" id="p10_impartido_si" name="p10_impartido">
                            <label for="p10_impartido_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p10_impartido" id="p10_impartido_no" name="p10_impartido">
                            <label for="p10_impartido_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p10_impartido')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 11 --}}
                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>11. ¿Habla alguna lengua indígena?</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p11_habla_lindigena" id="p11_habla_lindigena_si"
                                name="p11_habla_lindigena">
                            <label for="p11_habla_lindigena_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p11_habla_lindigena" id="p11_habla_lindigena_no"
                                name="p11_habla_lindigena">
                            <label for="p11_habla_lindigena_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p11_habla_lindigena')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($p11_habla_lindigena === 'Si')
                {{-- Prgeunta numero 11.1 --}}
                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>11.1- Cual</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" wire:model.lazy="p11_1_cual" id="p11_1_cual"
                            name="p11_1_cual">
                    </div>
                    <div class="col-12">
                        @error('p11_1_cual')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
                {{-- Prgeunta numero 12 --}}
                <div class="form-row col-12">
                    <div class="col-12">
                        <h5>12. ¿Sabe conducir automóvil? *</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p12_conducir" id="p12_conducir_si" name="p12_conducir">
                            <label for="p12_conducir_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p12_conducir" id="p12_conducir_no" name="p12_conducir">
                            <label for="p12_conducir_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p12_conducir')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($p12_conducir === 'Si')
                    {{-- Prgeunta numero 12.1 --}}
                    <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12">
                            <h5>12.1. ¿Cuenta con licencia de manejo? *</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="Si"
                                    wire:model.lazy="p12_1_licencia" id="p12_1_licencia_si" name="p12_1_licencia">
                                <label for="p12_1_licencia_si" class="form-check-label">Si</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="No"
                                    wire:model.lazy="p12_1_licencia" id="p12_1_licencia_no" name="p12_1_licencia">
                                <label for="p12_1_licencia_no" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div class="col-12">
                            @error('p12_1_licencia')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Prgeunta numero 12.2 --}}
                    <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12">
                            <h5>12.2. ¿Cuenta con vehículo propio? *</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="Si"
                                    wire:model.lazy="p12_2_vehiculo" id="p12_2_vehiculo_si" name="p12_2_vehiculo">
                                <label for="p12_2_vehiculo_si" class="form-check-label">Si</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="No"
                                    wire:model.lazy="p12_2_vehiculo" id="p12_2_vehiculo_no" name="p12_2_vehiculo">
                                <label for="p12_2_vehiculo_no" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div class="col-12">
                            @error('p12_2_vehiculo')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($p12_2_vehiculo === 'Si')
                        {{-- Prgeunta numero 12.3 --}}
                        <div class="form-row justify-content-between mb-3 col-12">
                            <div class="col-12">
                                <h5>12.3. Anote marca y modelo*.</h5>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" wire:model.lazy="p12_3_marca"
                                    id="p12_3_marca" name="p12_3_marca">
                            </div>
                            <div class="col-12">
                                @error('p12_3_marca')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- Prgeunta numero 12.4 --}}
                        <div class="form-row">
                            <div class="col-12">
                                <h5>12.4. ¿Está usted dispuesta/ o utilizar su vehículo
                                    para sus actividades si el OPL le brinda un apoyo
                                    económico para combustible? *</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="Si"
                                        wire:model.lazy="p12_4_prestar" id="p12_4_prestar_si" name="p12_4_prestar">
                                    <label for="p12_4_prestar_si" class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="No"
                                        wire:model.lazy="p12_4_prestar" id="p12_4_prestar_no" name="p12_4_prestar">
                                    <label for="p12_4_prestar_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            <div class="col-12">
                                @error('p12_4_prestar')
                                    <span class="text-danger error h6">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                @endif

                {{-- Prgeunta numero 13 --}}
                <div class="form-row">
                    <div class="col-12">
                        <h5>13. ¿Cuánto tiempo le lleva trasladarse de su
                            domicilio al OPL? *</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" id="timeInput" maxlength="5"  placeholder="00:00" class="form-control" wire:model.lazy="p13_tiempo_traslado"
                            id="p13_tiempo_traslado" name="p13_tiempo_traslado"> <span style="font-size: xsmall">Formato hrs:mins</span>
                        </div>
                        <script>
                    const timeInput = document.getElementById("timeInput");
                    timeInput.addEventListener("input", function () {
                        const value = this.value.replace(/[^0-9]/g, "");
                        if (value.length > 2) {
                            this.value = value.slice(0, 2) + ":" + value.slice(2);
                        }
                    });
                    </script>
                </div>
                    
                    <div class="col-12">
                        @error('p13_tiempo_traslado')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 14 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>14. ¿Cuenta con acceso a Internet en su casa? *</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p14_acceso_internet" id="p14_acceso_internet_si"
                                name="p14_acceso_internet">
                            <label for="p14_acceso_internet_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p14_acceso_internet" id="p14_acceso_internet_no"
                                name="p14_acceso_internet">
                            <label for="p14_acceso_internet_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p14_acceso_internet')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Prgeunta numero 15 --}}

                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>15. ¿Tiene alguna discapacidad? *</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p15_discapacidad" id="p15_discapacidad_si" name="p15_discapacidad">
                            <label for="p15_discapacidad_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p15_discapacidad" id="p15_discapacidad_no" name="p15_discapacidad">
                            <label for="p15_discapacidad_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p15_discapacidad')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Prgeunta numero 15.1 --}}
                @if ($p15_discapacidad === 'Si')
                    <div class="form-row justify-content-between mb-3 col-12">
                        <div class="col-12">
                            <h5>15.1 En caso de haber señalado “Sí” en la pregunta
                                15, selección una opción.</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="fisica_motora"
                                    wire:model.lazy="p15_1_tipodiscapacidad" id="p15_1_tipodiscapacidad_1"
                                    name="p15_1_tipodiscapacidad">
                                <label for="p15_1_tipodiscapacidad_1" class="form-check-label">A) Física o
                                    motora</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="intelectual"
                                    wire:model.lazy="p15_1_tipodiscapacidad" id="p15_1_tipodiscapacidad_2"
                                    name="p15_1_tipodiscapacidad">
                                <label for="p15_1_tipodiscapacidad_2" class="form-check-label">B) Intelectual</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="mental_psicosocial"
                                    wire:model.lazy="p15_1_tipodiscapacidad" id="p15_1_tipodiscapacidad_3"
                                    name="p15_1_tipodiscapacidad">
                                <label for="p15_1_tipodiscapacidad_3" class="form-check-label">C) Mental o
                                    psicosocial</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="sensorial"
                                    wire:model.lazy="p15_1_tipodiscapacidad" id="p15_1_tipodiscapacidad_4"
                                    name="p15_1_tipodiscapacidad">
                                <label for="p15_1_tipodiscapacidad_4" class="form-check-label">D) Sensorial</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="otro"
                                    wire:model.lazy="p15_1_tipodiscapacidad" id="p15_1_tipodiscapacidad_5"
                                    name="p15_1_tipodiscapacidad">
                                <label for="p15_1_tipodiscapacidad_5" class="form-check-label">Otro</label>
                            </div>
                        </div>
                        <div class="col-12">
                            @error('p15_1_tipodiscapacidad')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif
                {{-- Prgeunta numero 15.2 --}}
                @if ($p15_1_tipodiscapacidad === 'otro')
                    <div class="form-row justify-content-between mb-3">
                        <div class="col-12">
                            <h5>15.2 Especifique:</h5>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" wire:model.lazy="p15_2_otradiscapacidad"
                                id="p15_2_otradiscapacidad" name="p15_2_otradiscapacidad">
                        </div>
                        <div class="col-12">
                            @error('p15_2_otradiscapacidad')
                                <span class="text-danger error h6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif
                {{-- Prgeunta numero 16 --}}
                <div class="form-row justify-content-between mb-3 col-12">
                    <div class="col-12">
                        <h5>16. ¿Sabe utilizar el teléfono celular? *</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="Si"
                                wire:model.lazy="p16_utilizar_celular" id="p16_utilizar_celular_si"
                                name="p16_utilizar_celular">
                            <label for="p16_utilizar_celular_si" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="No"
                                wire:model.lazy="p16_utilizar_celular" id="p16_utilizar_celular_no"
                                name="p16_utilizar_celular">
                            <label for="p16_utilizar_celular_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="col-12">
                        @error('p16_utilizar_celular')
                            <span class="text-danger error h6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Prgeunta numero 12.4 --}}
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" wire:model="acepto_aviso"
                                   value="1"
                                   class="custom-control-input custom-control-input-success checkbox-3x"
                                   id="acepto-aviso">
                            <label class="custom-control-label" for="acepto-aviso">He leído el aviso de privacidad y acepto los términos y condiciones.</label>
                            <p class="text-justify">
                                El Organismo Público Local en el estado de (agregar entidad federativa), con domicilio en: (agregar dirección del OPL) reciba sus datos personales y es responsable del tratamiento que les dé. Los datos personales reunidos s serán utilizados para corroborar que la ciudadanía interesada en participar en el proceso de reclutamiento, selección y contratación de personal eventual que colaborará con el OPL como Supervisora/or Electoral Local o Capacitadora/or-Asistente Electoral Local, cumpla con los requisitos legales y administrativos establecidos en la Convocatoria. Simultáneamente, los datos personales serán utilizados para que la autoridad electoral cuente con información respecto de los grupos en situación de vulnerabilidad en los que se sitúan las personas con autoadscripción indígena; pertenecientes a la población afromexicana; que viven con algún tipo de discapacidad; que se consideran parte de las personas LGBTTTIQ+ o si se trata de una persona mexicana migrante, con el fin de realizar análisis de datos y estadísticas como insumos para el ejercicio de sus atribuciones, para determinar lo conducente en futuros procesos electorales. Lo anterior, de conformidad con el marco normativo electoral y con base en lo establecido en los artículos 6º Base A, fracciones II y III y 16, segundo párrafo de la Constitución Política de los Estados Unidos Mexicanos, así como los artículos 3º, fracción II y IX, 16, 17, 18, 19, 20, 21, 22, 23, 25,26, 27 y 28 de la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados. Si desea conocer nuestro aviso de privacidad integral consulte la siguiente dirección electrónica:
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" wire:model="acepto_ser_contactado"
                                   value="1"
                                   class="custom-control-input custom-control-input-success checkbox-3x"
                                   id="acepto-ser-contactado">
                            <label class="custom-control-label" for="acepto-ser-contactado">Acepto ser contactado/a vía correo electrónico para algún seguimiento o notificación de información sobre el proceso de reclutamiento y selección, en el que estoy participando. </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" wire:model="acepto_declaratoria"
                                   value="1"
                                   class="custom-control-input custom-control-input-success checkbox-3x"
                                   id="acepto-declaratoria">
                            <label class="custom-control-label" for="acepto-declaratoria">Acepto la declaratoria.</label>
                            <p class="text-justify">
                                Que de comprobarse que alguno de los datos asentados en esta Solicitud resultara falso, el OPL puede dejar sin efecto la presente solicitud o, en su caso, el compromiso que estableciera para contar con mis servicios, sin que el OPL incurra en responsabilidad alguna sobre el particular.</p>
                            <p class="text-justify">
                                De la misma manera manifiesto mantener en estricta reserva y no revelar ningún tipo de información sobre el contenido del Examen de conocimientos, habilidades y aptitudes, así como de la Entrevista para el proceso de selección de Supervisoras/es Electorales Locales y Capacitadoras/es-Asistentes Electorales Locales correspondiente al Proceso Electoral 2023-2024, en caso de acceder a ella.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        @if($acepto_aviso == 1)
                            <button class="btn btn-primary" wire:click.prevent="handlerSave">
                                <span wire:loading.remove wire:target="handlerSave">Guardar</span>
                                <span wire:loading wire:target="handlerSave">Guardando
                            información....</span>
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endif
    @if($this->registrado)
        <div class="card card-iepc-outline">
            <div class="card-header">
                <h4 class="card-title text-bold">Acuse de registro</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>Se ha registrado su solicitud con el folio siguiente:</p>
                        <div class="badge badge-info d-inline-block">
                            <h2>{{ $this->candidato->id }}</h2>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <p>Descargue los siguientes documentos y presentarse en las oficinas para el
                            cotejo de su información</p>
                        <div class="btn-group-toggle">
                            <a class="btn btn-iepc btn-lg" wire:click.prevent="generarFicha">
                                <span wire:loading.remove wire:target="generarFicha"><i class="fa fa-file-pdf"></i> Descargar solicitud</span>
                                <span wire:loading wire:target="generarFicha">Generando acuse....</span>
                            </a>
                            <a class="btn btn-warning btn-lg" wire:click.prevent="generarDeclaratoria">
                                <span wire:loading.remove wire:target="generarDeclaratoria"><i class="fa fa-file-signature"></i> Descargar declaratoria</span>
                                <span wire:loading wire:target="generarDeclaratoria">Generando declaratoria....</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center pt-5">
                        <p>Para registrar una nueva solicitud haga click en el siguiente boton</p>
                        <div class="btn-group-toggle">
                            <a class="btn btn-info btn-lg" href="/aspirante" wire:loading.remove>
                                <i class="fa fa-plus-circle"></i> Nuevo registro
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif

    @if($errors->any())
        <script wire:key="{{ rand() }}">
            let firstInvalidInput = document.querySelector(".is-invalid");
            if(firstInvalidInput)
                firstInvalidInput.focus({preventScroll:false});
        </script>
    @endif
</div>

@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            @this.on('confirmar', params => {
                Swal.fire({
                    icon: params.icon,
                    title: params.title,
                    html: params.text,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: params
                        .confirmText,
                    reverseButtons: true,
                }).then(result => {
                    if (result.value) {
                        @this.call(params.method)
                    }
                })
            })
        })
    </script>
@endsection
