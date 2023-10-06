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
        $candidatos =  Aspirante::where('estatus_publicacion', $this->estatus)->get();
        $this->total = count($candidatos);
    }
    public function render()
    {
        return view('livewire.aspirantes.resumen');
    }
}
