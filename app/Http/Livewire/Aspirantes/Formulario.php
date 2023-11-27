<?php

namespace App\Http\Livewire\Aspirantes;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Session\Store;
use Illuminate\Validation\Rule;
use Livewire\Component;

use App\Models\Aspirante;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public $curp;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $fecha_nacimiento;
    public $edad;
    public $genero;
    public $persona_lgbtttiq;
    public $otro_lgbtttiq;
    public $experiencia_laboral;
    public $dom_calle;
    public $dom_num_exterior;
    public $dom_num_interior;
    public $dom_colonia;
    public $dom_municipio;
    public $dom_localidad;
    public $tel_fijo;
    public $tel_celular;
    public $ultimo_grado_estudio;
    public $realiza_estudios;
    public $motivo_secae;
    public $medio_convocatoria;
    public $email;

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

    protected function rules() {

        return [
            'municipio'         => 'required|string',
            'localidad'         => 'required|string',
            'sede'              => 'required|string',
            'tipo_sede'         => 'required|string',
            'clave_elector'              => 'required|string',
            'seccion_electoral'             => 'required|string',
            'rfc'              =>  'nullable|string',
            'curp'           => 'nullable|string',
            'nombre'          => 'required|string',
            'apellido1'  => 'required|string',
            'apellido2'   => 'nullable|string',
            'fecha_nacimiento'    => 'required|date',
            'edad'    => 'nullable|integer',
            'genero'    => 'required|string',
            'persona_lgbtttiq'    => 'required|string',
            'otro_lgbtttiq'    => 'nullable|string',
            'dom_calle'    => 'nullable|string',
            'dom_num_exterior'    => 'nullable|string',
            'dom_num_interior'    => 'nullable|string',
            'dom_colonia'    => 'nullable|string',
            'dom_municipio'    => 'nullable|string',
            'dom_localidad'    => 'nullable|string',
            'tel_fijo'    => 'nullable|string',
            'tel_celular'    => 'nullable|string',
            'ultimo_grado_estudio' => 'required|string',
            'realiza_estudios' => 'nullable|string',
            'experiencia_laboral'   => 'nullable|array',
            'motivo_secae'   => 'nullable|string',
            'medio_convocatoria'   => 'nullable|string',
            'p1_proceso_electoral'   => 'required|string',
            'p1_1_cual'              => 'nullable|string',
            'p1_2_forma'             => 'nullable|string',

            'p3_finsemana'           => 'required|string',
            'p4_campo'               => 'required|string',
            'p5_milita'              => 'required|string',
            'p6_como_representante'  => 'required|string',
            'p7_familiar'            => 'required|string',
            'p8_servidora'            => 'required|string',
        ];
    }

    public function messages() {
        return [
            '*.required' => 'Este campo es requerido'
        ];
    }

    public function getRegistradoProperty() {
        return $this->candidato?->id > 0;
    }

    public function mount(Aspirante $candidato) {

        $this->grados         =  config('constants.grados');
        $this->tiposDeMedio   =  config('constants.tipos_de_medio');
        $this->sexos          =  config('constants.sexos');
        $this->entidades      =  config('constants.entidades');
        $this->municipios      =  config('constants.municipios');
        $this->paises         =  config('constants.paises');

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

        $this->candidato = Aspirante::create($dataFill);

        $this->notificar('success', 'Se ha registrado correctamente con el folio <strong>'.$this->candidato->id.'</strong>');
    }

    public function handlerSave() {


       $this->emit('confirmar', [
            'icon'    => 'question',
            'title'   => 'Confirmar información',
            'text'    => '¿Esta seguro de enviar sus datos?',
            'confirmText' => $this->aspirante_id > 0 ? 'Actualizar' : 'Guardar',
            'method'  => $this->aspirante_id > 0 ? "actualizar" : "'guardar'",
        ]);
    }
    public function actualizar() {


        $data     = $this->validate();
        $dataFill =  $data;

        Aspirante::where('id', $this->candidato_id)->update($dataFill);

        $candidato = Aspirante::find($this->candidato_id);

        $this->notificar('success', 'Registro actualizado');
    }

    public function agregarFormacion() {

        $formaciones = is_array($this->experiencia_laboral) ? $this->experiencia_laboral : [];

        $this->experiencia_laboral = $formaciones;
    }

    public function eliminarFormacion($index) {

        $formaciones = $this->experiencia_laboral ?? [];
        $formaciones =  array_filter($formaciones, fn($item, $idx) => $index != $idx, ARRAY_FILTER_USE_BOTH);
        $this->experiencia_laboral = $formaciones;
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
        \Log::info($this->candidato);
        $content = Pdf::loadView('aspirantes.acuse')->setPaper('legal')->output();
        return response()->streamDownload(fn() => print($content), 'ficha-'.time().'.pdf');
    }
}
