<?php

namespace App\Http\Livewire\Aspirantes;

use App\Models\Aspirante;
use App\Models\Entrevista as ModelEntrevista;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Validator;
use Livewire\Component;

class Entrevista extends Component
{

    public $aspirante;

    public $entrevista;

    public $tipo;

    public $habla_indigena;
    public $cual_lengua_indigena;
    public $motivo_participar;

    public $disponibilidad;
    public $trabajo_campo;
    public $participo_pe;
    public $cargo_tiempo_donde_pe;
    public $colaborado_pp_oc;
    public $cargo_tiempo_donde_pp_oc;

    public $competencia_1_pregunta;
    public $competencia_1_respuesta;

    public $competencia_2_pregunta;
    public $competencia_2_respuesta;

    public $competencia_3_pregunta;
    public $competencia_3_respuesta;

    public $competencia_4_pregunta;
    public $competencia_4_respuesta;

    public $competencia_5_pregunta;
    public $competencia_5_respuesta;


    protected $listeners = [
        'setAspirante',
        'resetear'
    ];


    public function rules() {
        return [
            'tipo' => 'required|string',
            'motivo_participar' => 'required|string|max:250',
            'habla_indigena'    => 'required|string',
            'cual_lengua_indigena'    => 'required_if:habla_indigena,=,SI|max:60',
            'disponibilidad'          => 'required|max:2',
            'trabajo_campo'           => 'required|max:2',
            'participo_pe'            => 'required|max:2',
            'cargo_tiempo_donde_pe'   => 'required_if:participo_pe,=,SI|max:100',
            'colaborado_pp_oc'        => 'required|max:2',
            'cargo_tiempo_donde_pp_oc'=> 'required_if:colaborado_pp_oc,=,SI|max:100',
            'competencia_1_pregunta'  => 'required|string',
            'competencia_1_respuesta' => 'required|string',
            'competencia_2_pregunta'  => 'required|string',
            'competencia_2_respuesta' => 'required|string',
            'competencia_3_pregunta'  => 'required|string',
            'competencia_3_respuesta' => 'required|string',
            'competencia_4_pregunta'  => 'required|string',
            'competencia_4_respuesta' => 'required|string',
            'competencia_5_pregunta'  => 'required_if:tipo,=,SEL',
            'competencia_5_respuesta' => 'required_if:tipo,=,SEL'

        ];
    }

    public function messages() {
        return [
            '*.required' => 'Campo obligatorio',
            '*.required_if' => 'Campo obligatorio',
            'competencia_1_pregunta.required' => 'Seleccione una pregunta de la lista',
            'competencia_2_pregunta.required' => 'Seleccione una pregunta de la lista',
            'competencia_3_pregunta.required' => 'Seleccione una pregunta de la lista',
            'competencia_4_pregunta.required' => 'Seleccione una pregunta de la lista',
            'competencia_5_pregunta.required' => 'Seleccione una pregunta de la lista',

        ];
    }

    public function updated($field) {
        return $this->validateOnly($field);
    }

    public function updatedTipo($valor) {

        $variables = [];
        for ($ii=1; $ii <= 5; $ii++) {

            $variables[] = 'competencia_'.$ii.'_pregunta';
            $variables[] = 'competencia_'.$ii.'_respuesta';
        }
        $this->reset($variables);
        $this->resetValidation($variables);

        if ($this->entrevista?->id > 0) {
            if ($this->entrevista?->tipo == $valor)
                $this->desconstruirCompetencias();
        }
    }

    public function getResultadoProperty() {

        $numeroCompetencias = $this->tipo === 'SEL' ? 5 : 4;
        $puntos = 0;
        for ($ii=1; $ii <= $numeroCompetencias; $ii++) {

           $puntos += $this->{"competencia_".$ii."_respuesta"};

        }
        return $puntos;
    }

    public function getCambioDeTipoProperty() {

        return $this->entrevista?->id > 0 ? ($this->entrevista?->tipo != $this->tipo) : false;
    }

    public function getPorcentajeObtenidoProperty() {

        $puntos = $this->resultado;

        $porcentaje = ($puntos * config('constants.porcentaje_entrevista')) / 100;

        if ($this->habla_indigena === 'SI')
            $porcentaje = $porcentaje +  10;

       return $porcentaje > config('constants.porcentaje_entrevista') ? number_format(config('constants.porcentaje_entrevista'),2) : number_format($porcentaje,2);
    }

    public function setAspirante($id) {

        $query = Aspirante::query();

        $query->whereRaw('id = ?', [$id]);

        $this->aspirante = $query->get()->first();


        if ($this->aspirante?->entrevista?->id > 0) {
            $this->entrevista = $this->aspirante->entrevista;
            $this->iniciarEntrevista();

        }
        else {
            $this->entrevista = new ModelEntrevista();
            $this->motivo_participar = $this->aspirante->motivo_secae;
            $this->habla_indigena = $this->aspirante->p11_habla_indigena === 'Si' ? 'SI' : 'NO';
            $this->cual_lengua_indigena = $this->aspirante->p11_habla_indigena === 'Si' ? $this->aspirante->p11_1_cual : null;
            $this->disponibilidad = $this->aspirante->p2_disponibilidad === 'Si' ? 'SI': 'NO';
            $this->trabajo_campo  = $this->aspirante->p4_campo=== 'Si' ? 'SI': 'NO';
            $this->participo_pe   = $this->aspirante->p1_proceso_electoral === 'Si' ? 'SI': 'NO';
            $this->cargo_tiempo_donde_pe = $this->aspirante->p1_proceso_electoral === 'Si' ? $this->aspirante->p1_1_cual: null;
        }

        $this->desconstruirCompetencias();
    }

    public function iniciarEntrevista() {

        $this->motivo_participar = $this->entrevista->motivo_participar;
        $this->habla_indigena = $this->entrevista->habla_indigena;
        $this->cual_lengua_indigena = $this->entrevista->cual_lengua_indigena;
        $this->disponibilidad = $this->entrevista->disponibilidad;
        $this->trabajo_campo  = $this->entrevista->trabajo_campo;
        $this->participo_pe   = $this->entrevista->participo_pe;
        $this->cargo_tiempo_donde_pe = $this->entrevista->cargo_tiempo_donde_pe;
        $this->colaborado_pp_oc  = $this->entrevista->colaborado_pp_oc;
        $this->cargo_tiempo_donde_pp_oc = $this->entrevista->cargo_tiempo_donde_pp_oc;
        $this->tipo = $this->entrevista->tipo;
    }

    public function guardar() {

        $this->withValidator(function (Validator $validator) {
            if($validator->fails()) {
                $this->emit('swal:alert', [
                    'icon'    => 'error',
                    'title'   => 'Revise los campos marcados del formulario',
                    'timeout' => 5000
                ]);
            }
        })->validate();


        $this->entrevista->aspirante_id = $this->aspirante->id;
        $this->entrevista->tipo         =  $this->tipo;
        $this->entrevista->competencias = $this->construirCompetencias();

        $this->entrevista->motivo_participar = $this->motivo_participar;
        $this->entrevista->habla_indigena    = $this->habla_indigena;
        $this->entrevista->cual_lengua_indigena = $this->cual_lengua_indigena;
        $this->entrevista->disponibilidad = $this->disponibilidad;
        $this->entrevista->trabajo_campo = $this->trabajo_campo;
        $this->entrevista->participo_pe = $this->participo_pe;
        $this->entrevista->cargo_tiempo_donde_pe = $this->cargo_tiempo_donde_pe;
        $this->entrevista->colaborado_pp_oc = $this->colaborado_pp_oc;
        $this->entrevista->cargo_tiempo_donde_pp_oc = $this->cargo_tiempo_donde_pp_oc;

        $this->entrevista->save();

        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Se ha guardado la información',
            'timeout' => 5000
        ]);

        $this->setAspirante($this->aspirante->id);
        //$this->emit('modal:hide', '#modal-entrevista');
    }

    public function render()
    {
        return view('livewire.aspirantes.entrevista');
    }

    public function construirCompetencias() {

        $competencias = [];
        $numeroCompetencias = $this->tipo === 'SEL' ? 5 : 4;

        for ($ii=1; $ii <= $numeroCompetencias; $ii++) {

            $cad['campo_pregunta'] = "competencia_".$ii."_pregunta";
            $cad['valor_pregunta'] = $this->{ "competencia_".$ii."_pregunta" };

            $cad['campo_respuesta'] = "competencia_".$ii."_respuesta";
            $cad['valor_respuesta'] = $this->{ "competencia_".$ii."_respuesta" };

            $competencias[] = $cad;
        }

        return $competencias;
    }

    public function desconstruirCompetencias() {

        foreach($this->entrevista?->competencias ?? [] as $competencia) {

           $this->{$competencia['campo_pregunta']}  = $competencia['valor_pregunta'];
           $this->{$competencia['campo_respuesta']} = $competencia['valor_respuesta'];
        }
    }

    public function generarAcuse() {

        $this->aspirante->load('entrevista');
        $this->aspirante->append(['ultimo_empleo']);
        $tipo = $this->tipo === 'SEL' ? 'aspirantes.sel' : 'aspirantes.cael';
        $content = Pdf::loadView($tipo, ['aspirante' => $this->aspirante])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'ENTREVISTA-'.$this->aspirante->clave_elector.'.pdf');
    }

    public function resetear() {

        $this->resetValidation();
        $this->reset();
    }
}
