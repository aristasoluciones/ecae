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

        $logEnviados = "";
        $logNoEnviados = "";
        $enviados = 0;
        $noEnviados = 0;
        foreach($this->destinatarios as $destinatario) {
            try {
                Mail::to($destinatario['email'])->send(new ComunicadoShipped($this->asunto, $this->mensaje));
                $enviados++;
                $logEnviados .="Correo enviado a ".$destinatario['email']."\n";
            } catch (\Throwable $e) {
                $noEnviados++;
                $logNoEnviados .="Error al enviar a ".$destinatario['email']." ".$e->getMessage()."\n";
            }
        }

        $fecha =  date('Y-m-d H:i:s');
        \Log::channel('sendemail')->info(' _____________INICIO '.$fecha.'__________________________________');
        \Log::channel('sendemail')->info('Correos enviados');
        \Log::channel('sendemail')->info($logEnviados);
        \Log::channel('sendemail')->info('Correos no enviados');
        \Log::channel('sendemail')->info($logNoEnviados);
        \Log::channel('sendemail')->info(' ______________FIN '.$fecha.'___________________________________');

        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Se han enviado '.$enviados." correos  y ".$noEnviados." no enviados",
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
