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

        $enviados = 0;
        $noEnviados = 0;
        foreach($this->destinatarios as $destinatario) {
            try {
                Mail::to($destinatario['email'])->queue(new ComunicadoShipped($this->asunto, $this->mensaje));
                $enviados++;
            } catch (\Throwable $e) {
                $noEnviados++;
            }
        }

        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Se han enviado '.$enviados.' correos '. ($noEnviados > 0 ? ' y '.$noEnviados.' no enviados' : ''),
            'timeout' => 5000
        ]);

        $this->resetear();
        $this->emit('modal:hide', '#modal-notificar');
    }

    public function render()
    {
        return view('livewire.aspirantes.notificar');
    }

    public function resetear() {
        $this->resetValidation();
        $this->reset(['asunto','mensaje','todos','destinatarios']);
    }
}
