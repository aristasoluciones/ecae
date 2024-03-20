<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Inicio extends Component
{
    public $municipioSeleccionado;

    public function seleccionarMunicipio($val) {

        $this->municipioSeleccionado = $val;
        $this->emitTo('charts.genero','setMun', $val);
        $this->emitTo('charts.edad','setMun', $val);
    }

    public function getMunicipiosProperty() {
        $municipios = config('constants.municipios');

        $municipios = array_filter($municipios, fn($mun) => !auth()->user()->hasRole('odes') || mb_strtoupper(auth()->user()->sede) === mb_strtoupper('CONSEJO MUNICIPAL ELECTORAL DE ' . $mun));
        return $municipios;
    }

    public function getTituloReporteProperty() {
        return $this->municipioSeleccionado ? 'INFORMACIÓN DEL MUNICIPIO DE '.mb_strtoupper($this->municipioSeleccionado) : 'INFORMACIÓN A NIVEL ESTADO';
    }

    public function validated($val) {

        return $this->validateOnly($val);
    }

    protected function rules() {
        return [
            'municipioSeleccionado' => 'nullable',
        ];
    }

    public function mount() {
        if(auth()->user()->hasRole('odes'))
            $this->municipioSeleccionado = str_replace('Consejo Municipal Electoral de ', '', auth()->user()->sede);
    }
    public function render()
    {
        return view('livewire.dashboard.inicio');
    }
}
