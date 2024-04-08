<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;
use App\Models\Aspirante;
class Resumen extends Component
{
    public $total;

    public $estatus;

    public $municipio;

    public $theme = 'info';

    public function mount() {

        $query = Aspirante::query();
        if (auth()->user()->hasRole('odes')) {
            $sedes = [auth()->user()->sede];
            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
            }
            $query->whereIn('sede',$sedes);
        }
        if($this->municipio) {
            $sedeString = "Consejo Municipal Electoral de ".trim($this->municipio);
            $query->whereRaw('sede = ?', $sedeString);
        }

        if($this->estatus)
            $query->where('estatus', $this->estatus);

        $candidatos = $query->get();

        $this->total = count($candidatos);
    }
    public function render()
    {
        return view('livewire.aspirantes.resumen');
    }
}
