<?php

namespace App\Http\Livewire\Aspirantes;


use Carbon\Carbon;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Rules\ClaveElectorRule;

use App\Models\Aspirante;
use App\Models\Documento;
use Barryvdh\DomPDF\Facade\Pdf;
class Solicitud extends Component
{
    use AuthorizesRequests;

    public $aspirante;

    public $editar;

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

    public $documentos;


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
        return $this->aspirante?->id > 0;
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

    public function mount(Aspirante $aspirante) {

        $this->grados               =  config('constants.grados');
        $this->tiposDeMedio         =  config('constants.tipos_de_medio');
        $this->sexos                =  config('constants.sexos');
        $this->entidades            =  config('constants.entidades');
        $this->municipios            =  config('constants.municipios');
        $this->paises                =  config('constants.paises');
        $this->localidades     =  config('constants.localidades');
        $this->localidadesFiltrado     =  [];
        $this->editar =  false;

        $this->documentos = Documento::all();

        $consejos = [];
        foreach($this->municipios as $mun) {
            $consejos[$mun] = 'Consejo Municipal Electoral de ' .$mun;
        }
        $this->consejosMunicipales     =  $consejos;
        $this->consejosFiltrado     =  [];


        $this->resetearAspirante();

        if($aspirante) {

            $this->aspirante = $aspirante;
            $this->aspirante_id = $aspirante->id;
            foreach($aspirante->toArray() as $key => $cad) {
                $this->{$key} = $cad;
            }

        }

        $this->fill([
            'experiencia_laboral' => $this->construirExperiencias($this->experiencia_laboral ?? []),
        ]);
    }

    public function render()
    {
        return view('livewire.aspirantes.solicitud');
    }

    public function guardar() {

        $data     = $this->validate();
        $dataFill =  $data;
        $dataFill['numero_convocatoria'] = 1;

        $this->aspirante = Aspirante::create($dataFill);

        $this->notificar('success', 'Se ha registrado correctamente con el folio <strong>'.$this->aspirante->id.'</strong>');
    }

    public function handlerSave() {

        $rules = $this->rules();
        $this->validate($rules);
        $this->emit('modal:show', '#modal-confirmar');
    }

    public function handlerAceptar() {

        $this->emit('modal:show', '#modal-aceptar');
    }
    public function actualizar() {


        $data     = $this->validate();
        $dataFill =  $data;

        Aspirante::where('id', $this->aspirante_id)->update($dataFill);

        Aspirante::find($this->aspirante_id);

        $this->notificar('success', 'Registro actualizado');
    }

    public function aceptar() {

        $this->aspirante->estatus = Aspirante::ESTATUS_ACEPTADO;
        $this->aspirante->save();
        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Se ha guardado la información',
            'timeout' => 5000
        ]);
        $this->redirect('/aspirantes');
    }

    public function notificar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);
        $this->reset(['editar']);
        $this->emit('modal:hide', '#modal-confirmar');;
        $this->render();

    }

    private function resetearAspirante() {

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
            'documentos',
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

        return array_merge_recursive_distinct($formaciones, $experiencias);
    }

    public function generarFicha() {

        $content = Pdf::loadView('aspirantes.acuse', ['aspirante' => $this->aspirante])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'SOLICITUD-'.strtoupper($this->aspirante->clave_elector).'.PDF');
    }

    public function generarDeclaratoria() {

        $content = Pdf::loadView('aspirantes.declaratoria', ['aspirante' => $this->aspirante])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'DECLARATORIA-'.strtoupper($this->aspirante->clave_elector).'.PDF');
    }
    public function toggleEditar() {
        $this->editar =  !$this->editar;
    }
}
