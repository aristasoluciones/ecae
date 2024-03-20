<?php

namespace App\Http\Livewire\Aspirantes;

use App\Mail\ComunicadoShipped;
use App\Models\Aspirante;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Notificar extends Component
{

    public $asunto;
    public $mensaje;

    public $destinatarios;
    public $todos;

    protected $listeners = [
        'resetear' => 'resetear',
        'setFiltro',
    ];

    public function updated($value) {
        return $this->validateOnly($value);
    }

    public function setFiltro($destinatarios,$todos) {
        $this->destinatarios = $destinatarios;
        $this->todos = $todos;
    }

    public function getMunicipiosProperty() {
        $municipios = config('constants.municipios');

        $municipios = array_filter($municipios, fn($mun) => !auth()->user()->hasRole('odes') || mb_strtoupper(auth()->user()->sede) === mb_strtoupper('CONSEJO MUNICIPAL ELECTORAL DE ' . $mun));
        return $municipios;
    }

    public function rules() {
        return [
            'asunto'  => 'required|string',
            'mensaje' => 'required|string'
        ];
    }

    public function enviar() {
        $this->validate();

        try {

            foreach ($this->destinatarios as $destinatario) {
                Mail::to($destinatario['email'])->send(new ComunicadoShipped($this->asunto, $this->mensaje));
            }

            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Se ha enviado el comunicado',
                'timeout' => 5000
            ]);

            $this->resetear();
            $this->emit('modal:hide', '#modal-notificar');

        } catch (\Exception $e) {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ha ocurrido un error intente nuevamente',
                'timeout' => 5000
            ]);
        }
    }

    public function render()
    {
        return view('livewire.aspirantes.notificar');
    }

    public function resetear() {
        $this->resetValidation();
        $this->reset(['asunto','mensaje']);
    }
}
