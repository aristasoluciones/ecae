<?php

namespace App\Http\Livewire\Aspirantes;

use App\Models\Aspirante;
use Livewire\Component;
use App\Models\Evaluacion as ModelEvaluacion;

class Evaluacion extends Component
{
    public $aspirante;
    public $aciertos;

    public $calificacion;

    public $discapacidad;

    public $lgbtttiq;
    public $calificacionFinal;

    public $evaluacion;


    protected $listeners = [
      'setAspirante',
      'resetear'
    ];

    protected function rules() {
        return [
          'aciertos' => 'required|numeric|max:'.intval(config('constants.aciertos_evaluacion')),
        ];
    }

    public function updated($field) {
        return $this->validateOnly($field);
    }

    public function updatedAciertos($value) {

        $calificacion = ($value * config('constants.calificacion_maxima')) / config('constants.aciertos_evaluacion');
        $this->calificacion = $calificacion;
        $this->discapacidad =  $calificacion >= config('constants.calificacion_minima') ? ($this->aspirante->p15_discapacidad === 'Si' ? 1 : 0) : 0;
        $this->lgbtttiq     =  $calificacion >= config('constants.calificacion_minima') ? ($this->aspirante->persona_lgbtttiq === 'Si' ? 1 : 0) : 0;

        $calificacion = $calificacion >=config('constants.calificacion_minima') ? ($calificacion + $this->discapacidad + $this->lgbtttiq) : $calificacion;

        $this->calificacionFinal = $calificacion > config('constants.calificacion_maxima') ? config('constants.calificacion_maxima') : $calificacion;

    }
    public function setAspirante($id) {

        $query = Aspirante::query();

        $query->whereRaw('id = ?', [$id]);

        $this->aspirante = $query->get()->first();

        if ($this->aspirante?->evaluacion?->id > 0)
            $this->evaluacion = $this->aspirante->evaluacion;
        else
            $this->evaluacion =  new ModelEvaluacion;

        $this->aciertos     = $this->aspirante?->evaluacion?->aciertos ?? 0;
        $this->calificacion = $this->aspirante?->evaluacion?->calificacion ?? 0;
        $this->discapacidad =
            $this->aspirante?->evaluacion
            ? ($this->aspirante->p15_discapacidad === 'Si' ? 1 : 0)
            : 0;
        $this->lgbtttiq =
            $this->aspirante?->evaluacion
                ? ($this->aspirante->persona_lgbtttiq === 'Si' ? 1 : 0)
                : 0;

        $this->calificacionFinal = $this->calificacion + $this->discapacidad + $this->lgbtttiq;
        $this->calificacionFinal = $this->calificacionFinal >  config('constants.calificacion_maxima')
            ?  config('constants.calificacion_maxima')
            : $this->calificacionFinal;

    }

    public function guardar() {

        $this->evaluacion->aspirante_id = $this->aspirante->id;
        $this->evaluacion->aciertos     =  $this->aciertos;
        $this->evaluacion->calificacion =  $this->calificacion;
        $this->evaluacion->discapacidad =  $this->discapacidad;
        $this->evaluacion->lgbtttiq     =  $this->lgbtttiq;
        $this->evaluacion->save();

        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Se ha guardado la información',
            'timeout' => 5000
        ]);

        $this->resetear();
        $this->emit('modal:hide', '#modal-evaluacion');
    }

    public function render()
    {
        return view('livewire.aspirantes.evaluacion');
    }

    public function resetear() {
        $this->resetValidation();
        $this->reset();
    }
}
