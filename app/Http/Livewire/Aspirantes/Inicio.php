<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;
use App\Models\Aspirante;
class Inicio extends Component
{
    public $btnCandidaturas = [];

    protected $currentTipo;



    public function mount() {

    }

    public function render()
    {
        return view('livewire.aspirantes.inicio');
    }
}
