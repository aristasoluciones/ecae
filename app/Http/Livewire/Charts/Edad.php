<?php

namespace App\Http\Livewire\Charts;

use App\Charts\ChartEdad;
use App\Models\Aspirante;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Edad extends ChartComponent
{
    public function updated($field) {
        return $this->validateOnly($field);
    }

    public function rules () {
        return [
            'municipio' => 'nullable',
        ];
    }
    public function updatedMunicipio($value) {
        $this->render();
    }

    public function getMunicipiosProperty() {
        return config('constants.municipios');
    }
    /**
     * @return string
     */
    protected function view(): string
    {
        return 'charts.default';
    }

    /**
     * @return string
     */
    protected function chartClass(): string
    {
        return ChartEdad::class;
    }

    /**
     * @return ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {
        $query = Aspirante::query();

        $query->select('edad', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes')) {

            $sedes = [auth()->user()->sede];
            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
            }
            $query->whereIn('sede',$sedes);
        }

        if($this->municipio)
            $query->where('municipio',$this->municipio);

        $resultados = $query->groupBy('edad')
            ->orderBy('edad', 'desc')
            ->get();


        $labels = $resultados->map(function(Aspirante $resultado) {
            return $resultado->edad;
        });

        $datasets = new Collection([
            $resultados->map(function(Aspirante $resultado) {
                return [$resultado->edad, intval($resultado->total), true];
            })
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
