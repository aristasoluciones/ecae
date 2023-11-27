<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;
use App\Models\Aspirante;
class Resumen extends Component
{
    public $total;

    public $estatus;
    public $theme = 'info';

    public function mount() {
        $candidatos =  Aspirante::all();
        $this->total = count($candidatos);
    }
    public function render()
    {
        return view('livewire.aspirantes.resumen');
    }
}
