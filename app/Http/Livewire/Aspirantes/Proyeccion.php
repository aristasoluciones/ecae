<?php

namespace App\Http\Livewire\Aspirantes;

use Livewire\Component;
use App\Models\Aspirante;
use App\Models\Consejo;
class Proyeccion extends Component
{
    public $total;

    public $numProyectados;
    public $numContratados;

    public $theme = 'info';

    public $figura;

    public $municipio;
    public $avance;

    public function mount() {

        $query = Aspirante::query();
        $queryConsejo = Consejo::query();

        $query->where('estatus', Aspirante::ESTATUS_ACEPTADO);

        $filtroMun = [];
        if (auth()->user()->hasRole('odes')) {
            $sedes = [auth()->user()->sede];
            $filtroMun = [trim(str_replace('Consejo Municipal Electoral de ', '', auth()->user()->sede))];

            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
                array_push($filtroMun, 'Oxchuc');
            }
            $query->whereIn('sede',$sedes);
        }

        if($this->municipio) {
            $query->where('municipio', $this->municipio);
            array_push($filtroMun, trim($this->municipio));
        }

        if (count($filtroMun) > 0) {
            $queryConsejo->whereHas('municipio', function ($query) use ($filtroMun) {
                $query->whereIn('nombre', $filtroMun);
            });
        }


        $candidatos = $query->get();
        $consejos   = $queryConsejo->get();

        switch (strtoupper($this->figura)) {
            case 'SEL':
                $this->numProyectados = $consejos->sum('numero_plaza_sel');
            break;
            case 'CAEL':
                $this->numProyectados = $consejos->sum('numero_plaza_cael');
                break;
            default:
                $this->numProyectados = $consejos->sum('numero_plaza_cael') + $consejos->sum('numero_plaza_sel');
            break;

        }

        $this->numContratados = 0;

        $this->avance = number_format(($this->numProyectados > 0 ? ($this->numContratados * 100)/$this->numProyectados : 0), 2);
        $this->avance = $this->avance > 100 ? 100 : $this->avance;

    }
    public function render()
    {
        return view('livewire.aspirantes.proyeccion');
    }
}
