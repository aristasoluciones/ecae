<?php

namespace App\Http\Livewire\Aspirantes;


use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Session\Store;
use Illuminate\Validation\Rule;
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
    public $email;
    public $acepto_aviso;
    public $acepto_ser_contactado;
    public $acepto_declaratoria;

    //Preguntas
    public $p1_proceso_electoral;
    public $p1_1_cual;
    public $p1_2_forma;
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
    public $consejosMunicipales;
    public $consejosFiltrado;


    protected function rules() {

        return [
            'municipio'         => 'required|string',
            'localidad'         => 'required|string',
            'sede'              => 'required|string',
            'tipo_sede'         => 'required|string',
            'clave_elector'     => ['required','string','size:18', new ClaveElectorRule],
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
            'otro_genero'    => 'nullable|string',
            'persona_lgbtttiq'    => 'required|string',
            'otro_lgbtttiq'    => 'required_if:persona_lgbtttiq,=,Otro',
            'dom_calle'    => 'required|string',
            'dom_num_exterior'    => 'required|string',
            'dom_num_interior'    => 'nullable|string',
            'dom_colonia'    => 'required|string',
            'dom_municipio'    => 'required|string',
            'dom_localidad'    => 'required|string',
            'dom_postal'    => 'required|string|size:5',
            'tel_fijo'         => 'nullable|string',
            'tel_celular'      => 'nullable|string',
            'ultimo_grado_estudio' => 'required|string',
            'carrera' => 'nullable|string',
            'realiza_estudios' => 'nullable|string',
            'experiencia_laboral'   => 'nullable|array',
            'experiencia_laboral.*.nombre'   => 'nullable|string',
            'experiencia_laboral.*.puesto'   => 'nullable|string',
            'experiencia_laboral.*.inicio'   => 'nullable|string',
            'experiencia_laboral.*.fin'   => 'nullable|string',
            'experiencia_laboral.*.telefono'   => 'nullable|string',
            'motivo_secae'   => 'nullable|string',
            'medio_convocatoria'    => 'required|string',
            //'email'    => 'required|email',
            'acepto_aviso' => 'required|integer',
            'acepto_ser_contactado' => 'nullable',
            'acepto_declaratoria'   => 'nullable',
            'p1_proceso_electoral'  => 'required|string',
            'p1_1_cual'             => 'nullable|string',
            'p1_2_forma'            => 'nullable|string',
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
            'p15_2_otradiscapacidad'=> 'required_if:p15_1_tipodiscapacidad,=,Otro',
            'p16_utilizar_celular'  => 'required|string',
        ];
    }

    public function updated($field) {
        return $this->validateOnly($field);
    }
    public function messages() {
        return [
            '*.required' => 'Este campo es obligatorio',
            '*.required_if' => 'Este campo es obligatorio'
        ];
    }

    public function getRegistradoProperty() {
        return $this->candidato?->id > 0;
    }

    public function updatedClaveElector($value) {

        if(strlen($value) <= 0)
            return;

        $nacAnio = substr($value,6,2);
        $nacMes = substr($value,8,2);
        $nacDia = substr($value,10,2);
        $anio = (int)$nacAnio + 1900;
        if($anio < 1938)
            $anio +=100;

        if(!checkdate($nacMes, $nacDia,$anio))
            return;

        $sexos = config('constants.sexos');
        $nacimiento = Carbon::parse($anio."-".$nacMes."-".$nacDia)->format('Y-m-d');
        $this->fecha_nacimiento = $nacimiento;
        $this->edad = Carbon::parse(config('constants.fecha_eleccion'))->diffInYears($nacimiento);
        $this->genero = $sexos[substr($value, 14,1)] ?? '';
    }

    
    public function updatedMunicipio($value) {

        $this->localidadesFiltrado = $this->localidades[$value] ?? [];
        $this->sede = $this->consejosMunicipales[$value] ?? [];

    }

    public function mount(Aspirante $candidato) {

        $this->grados               =  config('constants.grados');
        $this->tiposDeMedio         =  config('constants.tipos_de_medio');
        $this->sexos                =  config('constants.sexos');
        $this->entidades            =  config('constants.entidades');
        $this->municipios            =  config('constants.municipios');
        $this->paises                =  config('constants.paises');
        $this->localidades     =  config('constants.localidades');
        $this->localidadesFiltrado     =  [];

        $consejos = [];
        foreach($this->municipios as $mun) {
            $consejos[$mun] = mb_strtoupper('Consejo Municipal Electoral de ' .$mun);
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

        $this->fill([
            'experiencia_laboral' => $this->construirExperiencias($this->experiencia_laboral ?? []),
        ]);
    }

    public function render()
    {
        return view('livewire.aspirantes.formulario')
            ->extends('adminlte::public')
            ->section('content');
    }

    public function guardar() {

        $data     = $this->validate();
        $dataFill =  $data;
        $dataFill['numero_convocatoria'] = 1;
        $dataFill['acepto_ser_contactado'] = $dataFill['acepto_ser_contactado'] ?? 0;
        $dataFill['acepto_declaratoria'] = $dataFill['acepto_declaratoria'] ?? 0;

        $this->candidato = Aspirante::create($dataFill);

        $this->notificar('success', 'Se ha registrado correctamente con el folio <strong>'.$this->candidato->id.'</strong>');
    }

    public function handlerSave() {


       $this->emit('confirmar', [
            'icon'    => 'question',
            'title'   => 'Confirmar información',
            'text'    => '¿Esta seguro de enviar sus datos?',
            'confirmText' => $this->aspirante_id > 0 ? 'Actualizar' : 'Guardar',
            'method'  => $this->aspirante_id > 0 ? "actualizar" : "guardar",
        ]);
    }
    public function actualizar() {


        $data     = $this->validate();
        $dataFill =  $data;

        Aspirante::where('id', $this->candidato_id)->update($dataFill);

        $candidato = Aspirante::find($this->candidato_id);

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
            'consejosMunicipales',
            'consejosFiltrado',
            'fecha_nacimiento',
        ]);

        $this->fill([
            'experiencia_laboral' =>[],
        ]);
    }

    public function construirExperiencias(array $experiencias) {

        $formaciones = [];

        for ($ii = 0; $ii < 3; $ii++) {
            $formaciones[] = [
                'nombre' => '',
                'puesto' => '',
                'inicio' => '',
                'fin' => '',
                'telefono' => ''
            ];
        }

        return array_merge_recursive($formaciones, $experiencias);
    }

    public function generarFicha() {

        $content = Pdf::loadView('aspirantes.acuse', ['aspirante' => $this->candidato])->setPaper('legal')->output();
        return response()->streamDownload(fn() => print($content), 'ficha-'.time().'.pdf');
    }
}
