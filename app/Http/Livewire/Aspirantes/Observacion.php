<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;

use App\Models\Aspirante;
class Observacion extends Component
{
    public Aspirante $candidato;

    protected $listeners = ['open' => 'openModal'];

    public $campo;

    public function render()
    {
        return view('livewire.aspirantes.observacion');
    }

    public function guardar() {

        $this->emit('swal:alert', ['title' => $this->campo]);
    }
    public function openModal($id, $campo) {

        $this->candidato = Aspirante::find($id);
        $this->campo     = $campo;
        $this->emit('modal:show', '#modal-observacion');
    }
}
