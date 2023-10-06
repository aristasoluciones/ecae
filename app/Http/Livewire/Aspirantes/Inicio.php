<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;
use App\Models\Aspirante;
class Inicio extends Component
{
    public $btnCandidaturas = [];

    protected $currentTipo;

    public function filtrar($value)
    {
        $this->currentTipo = $value;
        $this->emitTo('aspirantes.lista', 'setTipoCandidatura', $value);
    }

    public function mount() {

        $query = Aspirante::selectRaw("tipo_candidatura, count(*)");

        if (auth()->user()->hasRole('representante')) {
            $query->where('partido', auth()->user()->partido);
        }
        $results =  $query->groupBy('tipo_candidatura')->get();

       if(count($results)) {
           $this->btnCandidaturas =  $results->toArray();
           $this->currentTipo = $this->btnCandidaturas[0]['tipo_candidatura'];
       }
    }

    public function render()
    {
        return view('livewire.aspirantes.inicio');
    }
}
