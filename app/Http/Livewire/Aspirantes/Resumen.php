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
        $query = Aspirante::query();
        if (auth()->user()->hasRole('odes')) {
            $query->where('sede','=',auth()->user()->sede);
        }
        $candidatos =  $query->where('estatus', $this->estatus)->get();
        $this->total = count($candidatos);
    }
    public function render()
    {
        return view('livewire.aspirantes.resumen');
    }
}
