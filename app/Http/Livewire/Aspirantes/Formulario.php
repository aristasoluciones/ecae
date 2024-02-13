<?php

namespace App\Http\Livewire\Aspirantes;


use App\Mail\RegistroShipped;
use App\Rules\FechaMenorIgualRule;
use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Livewire\Component;
use App\Rules\ClaveElectorRule;

use App\Models\Aspirante;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use function PHPUnit\Framework\isNull;

class Formulario extends Component
{
    use AuthorizesRequests;

    public  $candidato;

    public $aspirante_id;
    public $municipio;
    public $localidad;
    public $sede;
    public $tipo_sede;
    public $tipo_clave;
    public $clave_elector;
    public $seccion_electoral;
    public $rfc;
    public $homoclave;
    public $curp;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $fecha_nacimiento;
    public $edad;
    public $genero;
    public $otro_genero;
    public $persona_lgbtttiq;
    public $otro_lgbtttiq;
    public $experiencia_laboral;

    // experiencia
    public $experiencia_1_nombre;
    public $experiencia_1_puesto;
    public $experiencia_1_inicio;
    public $experiencia_1_fin;
    public $experiencia_1_actual;
    public $experiencia_1_telefono;

    public $experiencia_2_nombre;
    public $experiencia_2_puesto;
    public $experiencia_2_inicio;
    public $experiencia_2_fin;
    public $experiencia_2_actual;
    public $experiencia_2_telefono;

    public $experiencia_3_nombre;
    public $experiencia_3_puesto;
    public $experiencia_3_inicio;
    public $experiencia_3_fin;
    public $experiencia_3_actual;
    public $experiencia_3_telefono;

    public $dom_calle;
    public $dom_num_exterior;
    public $dom_num_interior;
    public $dom_colonia;
    public $dom_municipio;
    public $dom_localidad;
    public $dom_postal;
    public $tel_fijo;
    public $tel_celular;
    public $ultimo_grado_estudio;
    public $carrera;
    public $realiza_estudios;
    public $motivo_secae;
    public $medio_convocatoria;
    public $otro_medio_convocatoria;
    public $email;
    public $email_confirmation;
    public $acepto_aviso;
    public $acepto_ser_contactado;
    public $acepto_declaratoria;

    //Preguntas
    public $p1_proceso_electoral;
    public $p1_1_cual;
    public $p1_2_forma;
    public $p1_2_otra_forma;
    public $p2_disponibilidad;
    public $p3_finsemana;
    public $p4_campo;
    public $p5_milita;
    public $p6_como_representante;
    public $p7_familiar;
    public $p8_servidora;
    public $p9_experiencia;
    public $p10_impartido;
    public $p11_habla_lindigena;
    public $p11_1_cual;
    public $p12_conducir;
    public $p12_1_licencia;
    public $p12_2_vehiculo;
    public $p12_3_marca;
    public $p12_4_prestar;
    public $p13_tiempo_traslado;
    public $p14_acceso_internet;
    public $p15_discapacidad;
    public $p15_1_tipodiscapacidad;
    public $p15_2_otradiscapacidad;
    public $p16_utilizar_celular;


    //CATALOGOS
    public $grados;
    public $tiposDeMedio;
    public $paises;
    public $entidades;
    public $municipios;
    public $localidades;
    public $localidadesFiltrado;
    public $domLocalidadesFiltrado;
    public $consejosMunicipales;
    public $consejosFiltrado;


    protected function rules() {

        return [
            'municipio'         => 'required|string',
            'localidad'         => 'required|string',
            'sede'              => 'required|string',
            'tipo_sede'         => 'required|string',
            'tipo_clave'        => 'required|string',
            'clave_elector'     => ['required',$this->tipo_clave === 'Clave de elector' ? 'size:18' : 'max:18', $this->tipo_clave === 'Clave de elector'  ? new ClaveElectorRule : 'string'],
            'seccion_electoral' => 'required|string|size:4',
            'rfc'              =>  'nullable|string|size:10',
            'homoclave'              =>  'nullable|string|size:3',
            'curp'           => 'nullable|string',
            'nombre'          => 'required|string',
            'apellido1'  => 'required|string',
            'apellido2'   => 'required|string',
            'fecha_nacimiento'    => 'required|date',
            'edad'    => 'required|integer',
            'genero'    => 'required|string',
            'otro_genero'    => 'required_if:genero,=,Otro',
            'persona_lgbtttiq'    => 'required|string',
            'otro_lgbtttiq'    => 'required_if:persona_lgbtttiq,=,Otro',
            'dom_calle'    => 'required|string',
            'dom_num_exterior'    => 'required|string',
            'dom_num_interior'    => 'nullable|string',
            'dom_colonia'    => 'required|string',
            'dom_municipio'    => 'required|string',
            'dom_localidad'    => 'required|string',
            'dom_postal'    => 'required|string|size:5',
            'tel_fijo'         => 'nullable|string|size:10',
            'tel_celular'      => 'required|string|size:10',
            'ultimo_grado_estudio' => 'required|string',
            'carrera' => 'required_if:ultimo_grado_estudio,"Carrera (especifique)"',
            'realiza_estudios' => 'nullable|string',
            //EXPERIENCIA1
            'experiencia_1_nombre' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_puesto)
                || strlen($this->experiencia_1_inicio)
                || strlen($this->experiencia_1_fin)
                || strlen($this->experiencia_1_telefono))
            ),'max:100'
            ],
            'experiencia_1_puesto' => [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_nombre)
                || strlen($this->experiencia_1_inicio)
                || strlen($this->experiencia_1_fin)
                || strlen($this->experiencia_1_telefono))
            ),'max:100'],
            'experiencia_1_inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_nombre)
                || strlen($this->experiencia_1_puesto)
                || strlen($this->experiencia_1_fin)
                || strlen($this->experiencia_1_telefono))
            ), strlen($this->experiencia_1_inicio) && strlen($this->experiencia_1_fin) ? 'before_or_equal:experiencia_1_fin' : 'nullable'],
            'experiencia_1_fin' => [Rule::requiredIf(fn() => (
                    !$this->experiencia_1_actual
                    && (strlen($this->experiencia_1_nombre)
                    || strlen($this->experiencia_1_puesto)
                    || strlen($this->experiencia_1_inicio)
                    || strlen($this->experiencia_1_telefono))
                    )
                ),strlen($this->experiencia_1_fin) && strlen($this->experiencia_1_inicio) ? 'after_or_equal:experiencia_1_inicio' : 'nullable'
            ],
            'experiencia_1_actual' => 'nullable',
            'experiencia_1_telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_nombre)
                || strlen($this->experiencia_1_puesto)
                || strlen($this->experiencia_1_inicio)
                || strlen($this->experiencia_1_fin))
            ),'max:10'],

            //EXPERIENCIA 2
            'experiencia_2_nombre' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_puesto)
                || strlen($this->experiencia_2_inicio)
                || strlen($this->experiencia_2_fin)
                || strlen($this->experiencia_2_telefono))
            ),'max:100'
            ],
            'experiencia_2_puesto' => [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_nombre)
                || strlen($this->experiencia_2_inicio)
                || strlen($this->experiencia_2_fin)
                || strlen($this->experiencia_2_telefono))
            ),'max:100'],
            'experiencia_2_inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_nombre)
                || strlen($this->experiencia_2_puesto)
                || strlen($this->experiencia_2_fin)
                || strlen($this->experiencia_2_telefono))
            ),strlen($this->experiencia_2_inicio) && strlen($this->experiencia_2_fin) ? 'before_or_equal:experiencia_2_fin' : 'nullable'],
            'experiencia_2_fin'    => [Rule::requiredIf(fn() => (
                !$this->experiencia_2_actual
                && (strlen($this->experiencia_2_nombre)
                    || strlen($this->experiencia_2_puesto)
                    || strlen($this->experiencia_2_inicio)
                    || strlen($this->experiencia_2_telefono)))
            ),strlen($this->experiencia_2_fin) && strlen($this->experiencia_2_inicio) ? 'after_or_equal:experiencia_2_inicio' : 'nullable'
            ],
            'experiencia_2_actual' => 'nullable',
            'experiencia_2_telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_nombre)
                || strlen($this->experiencia_2_puesto)
                || strlen($this->experiencia_2_inicio)
                || strlen($this->experiencia_2_fin))
            ),'max:10'],


            //EXPERIENCIA 3
            'experiencia_3_nombre' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_puesto)
                || strlen($this->experiencia_3_inicio)
                || strlen($this->experiencia_3_fin)
                || strlen($this->experiencia_3_telefono))
            ),'max:100'
            ],
            'experiencia_3_puesto' => [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_nombre)
                || strlen($this->experiencia_3_inicio)
                || strlen($this->experiencia_3_fin)
                || strlen($this->experiencia_3_telefono))
            ),'max:100'],
            'experiencia_3_inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_nombre)
                || strlen($this->experiencia_3_puesto)
                || strlen($this->experiencia_3_telefono))
            ),strlen($this->experiencia_3_inicio) && strlen($this->experiencia_3_fin) ? 'before_or_equal:experiencia_3_fin' : 'nullable'],
            'experiencia_3_fin'    => [Rule::requiredIf(fn() => (
                !$this->experiencia_3_actual
                && (strlen($this->experiencia_3_nombre)
                    || strlen($this->experiencia_3_puesto)
                    || strlen($this->experiencia_3_inicio)
                    || strlen($this->experiencia_3_telefono))
            )
            ),strlen($this->experiencia_3_fin) && strlen($this->experiencia_3_inicio) ? 'after_or_equal:experiencia_3_inicio' : 'nullable'
            ],
            'experiencia_3_actual' => 'nullable',
            'experiencia_3_telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_nombre)
                || strlen($this->experiencia_3_puesto)
                || strlen($this->experiencia_3_inicio)
                || strlen($this->experiencia_3_fin))
            ),'max:10'],

            'motivo_secae'   => 'required|string|max:250',
            'medio_convocatoria'    => 'required|string:max:50',
            'otro_medio_convocatoria'  => 'required_if:medio_convocatoria,"L. Otro"',
            'email'    => 'required|email|confirmed',
            'email_confirmation'    => 'required|email|same:email',
            'acepto_aviso' => 'required|integer',
            'acepto_ser_contactado' => 'nullable',
            'acepto_declaratoria'   => 'nullable',
            'p1_proceso_electoral'  => 'required|string',
            'p1_1_cual'             => 'required_if:p1_proceso_electoral,=,Si',
            'p1_2_forma'            => 'required_if:p1_proceso_electoral,=,Si',
            'p1_2_otra_forma'       => 'required_if:p1_2_forma,=,Otro',
            'p2_disponibilidad'     => 'required|string',
            'p3_finsemana'          => 'required|string',
            'p4_campo'              => 'required|string',
            'p5_milita'             => 'required|string',
            'p6_como_representante' => 'required|string',
            'p7_familiar'           => 'required|string',
            'p8_servidora'          => 'required|string',
            'p9_experiencia'        => 'required|string',
            'p10_impartido'         => 'required|string',
            'p11_habla_lindigena'   => 'required|string',
            'p11_1_cual'            => 'required_if:p11_habla_lindigena,=,Si',
            'p12_conducir'          => 'required|string',
            'p12_1_licencia'        => 'required_if:p12_conducir,=,Si',
            'p12_2_vehiculo'        => 'required_if:p12_conducir,=,Si',
            'p12_3_marca'           => 'required_if:p12_2_vehiculo,=,Si',
            'p12_4_prestar'         => 'required_if:p12_2_vehiculo,=,Si',
            'p13_tiempo_traslado'   => 'required|string',
            'p14_acceso_internet'   => 'required|string',
            'p15_discapacidad'      => 'required|string',
            'p15_1_tipodiscapacidad'=> 'required_if:p15_discapacidad,=,Si',
            'p15_2_otradiscapacidad'=> 'required_if:p15_1_tipodiscapacidad,=,otro',
            'p16_utilizar_celular'  => 'required|string',
        ];
    }

    public function rulesExperiencia1() {
        return [
            'inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_nombre)
                || strlen($this->experiencia_1_puesto)
                || strlen($this->experiencia_1_fin)
                || strlen($this->experiencia_1_telefono))
            ), strlen($this->experiencia_1_inicio) && strlen($this->experiencia_1_fin) ? 'before_or_equal:experiencia_1_fin' : 'nullable'],
            'fin' => [Rule::requiredIf(fn() => (
                !$this->experiencia_1_actual
                && (strlen($this->experiencia_1_nombre)
                    || strlen($this->experiencia_1_puesto)
                    || strlen($this->experiencia_1_inicio)
                    || strlen($this->experiencia_1_telefono))
            )
            ),strlen($this->experiencia_1_fin) && strlen($this->experiencia_1_inicio) ? 'after_or_equal:experiencia_1_inicio' : 'nullable'
            ],
            'actual' => 'nullable',
            'telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_1_actual
                || strlen($this->experiencia_1_nombre)
                || strlen($this->experiencia_1_puesto)
                || strlen($this->experiencia_1_inicio)
                || strlen($this->experiencia_1_fin))
            ),'max:10'],
        ];
    }

    public function rulesExperiencia2() {
        return [
            'inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_nombre)
                || strlen($this->experiencia_2_puesto)
                || strlen($this->experiencia_2_fin)
                || strlen($this->experiencia_2_telefono))
            ),strlen($this->experiencia_2_inicio) && strlen($this->experiencia_2_fin) ? 'before_or_equal:experiencia_2_fin' : 'nullable'],
            'fin'    => [Rule::requiredIf(fn() => (
                !$this->experiencia_2_actual
                && (strlen($this->experiencia_2_nombre)
                    || strlen($this->experiencia_2_puesto)
                    || strlen($this->experiencia_2_inicio)
                    || strlen($this->experiencia_2_telefono)))
            ),strlen($this->experiencia_2_fin) && strlen($this->experiencia_2_inicio) ? 'after_or_equal:experiencia_2_inicio' : 'nullable'
            ],
            'actual' => 'nullable',
            'telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_2_actual
                || strlen($this->experiencia_2_nombre)
                || strlen($this->experiencia_2_puesto)
                || strlen($this->experiencia_2_inicio)
                || strlen($this->experiencia_2_fin))
            ),'max:10'],
        ];
    }
    public function rulesExperiencia3() {
        return [
            'inicio' => [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_nombre)
                || strlen($this->experiencia_3_puesto)
                || strlen($this->experiencia_3_telefono))
            ),strlen($this->experiencia_3_inicio) && strlen($this->experiencia_3_fin) ? 'before_or_equal:experiencia_3_fin' : 'nullable'],
            'fin'    => [Rule::requiredIf(fn() => (
                !$this->experiencia_3_actual
                && (strlen($this->experiencia_3_nombre)
                    || strlen($this->experiencia_3_puesto)
                    || strlen($this->experiencia_3_inicio)
                    || strlen($this->experiencia_3_telefono))
            )
            ),strlen($this->experiencia_3_fin) && strlen($this->experiencia_3_inicio) ? 'after_or_equal:experiencia_3_inicio' : 'nullable'
            ],
            'actual' => 'nullable',
            'telefono' =>  [Rule::requiredIf(fn() => (
                $this->experiencia_3_actual
                || strlen($this->experiencia_3_nombre)
                || strlen($this->experiencia_3_puesto)
                || strlen($this->experiencia_3_inicio)
                || strlen($this->experiencia_3_fin))
            ),'max:10']
        ];
    }
    public function updated($field) {
        return $this->validateOnly($field);
    }
    public function messages() {

        $addRules = [];
        for ($ii=1; $ii<=3; $ii++) {
            $addRules[ "experiencia_".$ii."_nombre.required_with"] = 'Este campo es obligatorio';
            $addRules[ "experiencia_".$ii."_puesto.required_with"] = 'Este campo es obligatorio';
            $addRules[ "experiencia_".$ii."_inicio.required_with"] = 'Este campo es obligatorio';
            $addRules[ "experiencia_".$ii."_fin.required_with"] = 'Este campo es obligatorio';
            $addRules[ "experiencia_".$ii."_actual.required_with"] = 'Este campo es obligatorio';
            $addRules[ "experiencia_".$ii."_telefono.required_with"] = 'Este campo es obligatorio';
        }

        return array_merge([
            '*.required' => 'Este campo es obligatorio.',
            '*.required_if' => 'Este campo es obligatorio.',
            'email.confirmation' => 'Los campos Correo electrónico y Confirmar correo electrónico deben coincidir.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email_confirmation.same' => 'Los campos Correo electrónico y Confirmar correo electrónico deben coincidir.',
            'email_confirmation.email' => 'El campo  Confirmar correo electrónico debe ser una dirección de correo válida.',
            '*.after_or_equal' => 'El campo fecha final debe ser una fecha posterior o igual a la fecha inicio',
            '*.before_or_equal' => 'El campo fecha inicio debe ser una fecha anterior o igual a la fecha final',
        ], $addRules);
    }

    public function getRegistradoProperty() {
        return $this->candidato?->id > 0;
    }

    public function updatedClaveElector($value) {

        if($this->tipo_clave != 'Clave de elector') {
            return;
        }

        if(strlen($value) != 18) {
            return;
        }

        $nacAnio = substr($value,6,2);
        $nacMes = substr($value,8,2);
        $nacDia = substr($value,10,2);
        $anio = (int)$nacAnio + 1900;
        if($anio < 1938)
            $anio +=100;

        if(!checkdate($nacMes, $nacDia,$anio)) {
            $this->reset(['fecha_nacimiento','edad','genero']);
            return;
        }

        $sexos = config('constants.sexos');
        $nacimiento = Carbon::parse($anio."-".$nacMes."-".$nacDia)->format('Y-m-d');
        $this->fecha_nacimiento = $nacimiento;
        $this->edad = Carbon::parse(config('constants.fecha_eleccion'))->diffInYears($nacimiento);
        $this->genero = $sexos[substr($value, 14,1)] ?? '';

        $this->validate([
            'fecha_nacimiento'    => 'required|date',
            'edad'    => 'required|integer',
            'genero'    => 'required|string',
        ]);
    }

    public function updatedTipoClave($value) {

        $this->reset(['clave_elector']);
        if($value != 'Clave de elector') {
            $this->reset(['fecha_nacimiento','edad','genero']);
        }
    }

    public function updatedP1ProcesoElectoral() {

        $this->p1_1_cual = null;
        $this->p1_2_forma = null;
        $this->p1_2_otra_forma = null;
    }

    public function updatedMunicipio($value) {
        $this->localidadesFiltrado = $this->localidades[$value] ?? [];
        $this->sede = $this->consejosMunicipales[$value] ?? [];

    }

    public function updatedDomMunicipio($value) {
        $this->domLocalidadesFiltrado = $this->localidades[$value] ?? [];
    }

    public function updatedEmail($value) {
        $this->email =  mb_strtoupper($value);
        $this->validate(['email_confirmation' => 'nullable|email|same:email']);
    }

    public function updatedEmailConfirmation($value) {
        $this->email_confirmation =  mb_strtoupper($value);
        $this->validate(['email' => 'nullable|email|confirmed']);
    }

    public function updatedExperiencia1Inicio($value) {

        $this->validate([
            'experiencia_1_fin' => $this->rulesExperiencia1()['fin']
        ]);
    }

    public function updatedExperiencia1Fin($value) {

        $this->validate([
            'experiencia_1_inicio' => $this->rulesExperiencia1()['inicio']
        ]);
    }
    public function updatedExperiencia1Actual($value) {
        if($value == 1)
            $this->experiencia_1_fin = null;
        else
            $this->experiencia_1_actual =  0;

        $this->validate([
            'experiencia_1_fin' =>  $this->rulesExperiencia1()['fin']
        ]);
    }

    public function updatedExperiencia2Inicio($value) {

        $this->validate([
            'experiencia_2_fin' => $this->rulesExperiencia2()['fin']
        ]);
    }

    public function updatedExperiencia2Fin($value) {

        $this->validate([
            'experiencia_2_inicio' => $this->rulesExperiencia2()['inicio']
        ]);
    }

    public function updatedExperiencia2Actual($value) {
        if($value == 1)
            $this->experiencia_2_fin = null;
        else
            $this->experiencia_2_actual =  0;

        $this->validate([
            'experiencia_2_fin' =>  $this->rulesExperiencia2()['fin']
        ]);
    }

    public function updatedExperiencia3Inicio($value) {

        $this->validate([
            'experiencia_3_fin' => $this->rulesExperiencia3()['fin']
        ]);
    }
    public function updatedExperiencia3Fin($value) {

        $this->validate([
            'experiencia_3_inicio' => $this->rulesExperiencia3()['inicio']
        ]);
    }
    public function updatedExperiencia3Actual($value) {;
        if($value == 1)
            $this->experiencia_3_fin = null;
        else
            $this->experiencia_3_actual =  0;

        $this->validate([
            'experiencia_3_fin' =>  $this->rulesExperiencia3()['fin']
        ]);
    }

    public function mount(Aspirante $candidato) {

        $this->grados      =  config('constants.grados');
        $this->tiposDeMedio=  config('constants.tipos_de_medio');
        $this->sexos       =  config('constants.sexos');
        $this->entidades   =  config('constants.entidades');
        $this->municipios  =  config('constants.municipios');
        $this->paises      =  config('constants.paises');
        $this->localidades =  config('constants.localidades');

        $this->localidadesFiltrado     =  [];
        $this->domLocalidadesFiltrado     =  [];


        $consejos = [];
        foreach($this->municipios as $mun) {
            $consejos[$mun] = 'Consejo Municipal Electoral de ' .$mun;
        }
        $this->consejosMunicipales     =  $consejos;
        $this->consejosFiltrado     =  [];


        $this->resetearCandidato();

        if($candidato) {

            $this->candidato = $candidato;
            $this->aspirante_id = $candidato->id;
            foreach($candidato->toArray() as $key => $cad) {
                $this->{$key} = $cad;
            }
        }

        $this->iniciarExperiencias($this->experiencia_laboral ?? []);
    }

    public function render()
    {
        $this->tipo_sede = 'Fija';
        return view('livewire.aspirantes.formulario')
            ->extends('adminlte::public')
            ->section('content');
    }

    public function guardar() {

        $data     = $this->validate();
        $dataFill =  $data;

        unset($dataFill['email_confirmation']);
        $dataFill['numero_convocatoria'] = 1;
        $dataFill['acepto_ser_contactado'] = $dataFill['acepto_ser_contactado'] ?? 0;
        $dataFill['acepto_declaratoria'] = $dataFill['acepto_declaratoria'] ?? 0;

        $experiencias = [];
        for ($ii=1; $ii<=3; $ii++) {
            $cad = [];
            $atributo = "experiencia_".$ii."_nombre";
            $cad['nombre'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);

            $atributo = "experiencia_".$ii."_puesto";
            $cad['puesto'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);

            $atributo = "experiencia_".$ii."_inicio";
            $cad['inicio'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);

            $atributo = "experiencia_".$ii."_fin";
            $cad['fin'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);

            $atributo = "experiencia_".$ii."_actual";
            $cad['actual'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);

            $atributo = "experiencia_".$ii."_telefono";
            $cad['telefono'] =  $dataFill[$atributo];
            unset($dataFill[$atributo]);
            $experiencias[] =  $cad;
        }


        $dataFill['experiencia_laboral'] =  $experiencias;
        $this->candidato = Aspirante::create($dataFill);

        try {
            if(strlen($this->candidato->email) > 0) {
                $files = [
                    'SOLICITUD'.strtoupper($this->candidato->clave_elector) => Pdf::loadView('aspirantes.acuse', ['aspirante' => $this->candidato])->setPaper('letter')->output(),
                    'DECLARATORIA_'.strtoupper($this->candidato->clave_elector) => Pdf::loadView('aspirantes.declaratoria', ['aspirante' => $this->candidato])->setPaper('letter')->output()
                ];
                Mail::to($this->candidato->email)->send(new RegistroShipped($files));
            }
            $this->emit('modal:hide', '#modal-confirmar');

        } catch (\Exception $e) {
            $this->emit('modal:hide', '#modal-confirmar');
            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Se ha registrado correctamente con el folio <strong>'.$this->candidato->id.'</strong>',
                'timeout' => 5000
            ]);

        }

    }

    public function handlerSave() {

        $this->withValidator(function (Validator $validator) {
            if($validator->fails()) {
                $this->emit('swal:alert', [
                    'icon'    => 'error',
                    'title'   => 'Revise los campos marcados del formulario',
                    'timeout' => 5000
                ]);
            }
        })->validate();

        $this->emit('modal:show', '#modal-confirmar');
    }
    public function actualizar() {


        $data     = $this->validate();
        $dataFill =  $data;

        Aspirante::where('id', $this->candidato_id)->update($dataFill);


        $this->notificar('success', 'Registro actualizado');
    }

    public function notificar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);

        $this->render();

    }

    private function resetearCandidato() {

        $this->resetExcept([
            'filterCount',
            'id',
            'grados',
            'tiposDeMedio',
            'sexos',
            'paises',
            'entidades',
            'municipios',
            'localidades',
            'localidadesFiltrado',
            'domLocalidadesFiltrado',
            'consejosMunicipales',
            'consejosFiltrado',
            'fecha_nacimiento',
        ]);

        $this->fill([
            'experiencia_laboral' =>[],
        ]);
    }

    public function iniciarExperiencias(array $experiencias) {

        foreach ($experiencias as $kk => $experiencia) {

            $atributo = 'experiencia_'.($kk +1).'_nombre';
            $this->{$atributo} = $experiencia['nombre'] ?? null;

            $atributo = 'experiencia_'.($kk +1).'_puesto';
            $this->{$atributo} = $experiencia['puesto'] ?? null;

            $atributo = 'experiencia_'.($kk +1).'_inicio';
            $this->{$atributo} = $experiencia['inicio'] ?? null;

            $atributo = 'experiencia_'.($kk +1).'_fin';
            $this->{$atributo} = $experiencia['fin'] ?? null;

            $atributo = 'experiencia_'.($kk +1).'_actual';
            $this->{$atributo} = $experiencia['actual'] ?? null;

            $atributo = 'experiencia_'.($kk +1).'_telefono';
            $this->{$atributo} = $experiencia['telefono'] ?? null;
        }

    }

    public function generarFicha() {

        $content = Pdf::loadView('aspirantes.acuse', ['aspirante' => $this->candidato])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'SOLICITUD-'.strtoupper($this->candidato->clave_elector).'.PDF');
    }

    public function generarDeclaratoria() {

        $content = Pdf::loadView('aspirantes.declaratoria', ['aspirante' => $this->candidato])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'DECLARATORIA-'.strtoupper($this->candidato->clave_elector).'.PDF');
    }
}
