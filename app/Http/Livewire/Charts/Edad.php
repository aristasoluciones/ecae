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

    public $listeners = [
        'setMun' => 'setMunicipio'
    ];

    public function setMunicipio($val) {
        $this->municipio = $val;
    }
    public function updated($field) {
        return $this->validateOnly($field);
    }

    public function updatedMunicipio($value) {

    }
    public function rules () {
        return [
            'municipio' => 'nullable',
        ];
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
        $rangos = [
            [
                "name" => "De 18 a 20 Años",
                "min"  => 18,
                "max"  => 20,
            ],
            [
                "name" => "De 21 a 29 Años",
                "min"  => 21,
                "max"  => 29,
            ],
            [
                "name" => "De 30 a 40 Años",
                "min"  => 30,
                "max"  => 40,
            ],
            [
                "name" => "De 41 a 50 Años",
                "min"  => 41,
                "max"  => 50,
            ],
            [
                "name" => "De 51 a 60 Años",
                "min"  => 51,
                "max"  => 60,
            ],
            [
                "name" => "Mayor a 60",
                "min"  => 61,
                "max"  => 150,
            ],

        ];
        $query = Aspirante::query();

        $query->select('edad');

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
            //$query->where('municipio', $this->municipio);
        }

        $resultados = $query->orderBy('edad', 'desc')
                      ->get();


        /*$labels = $resultados->map(function(Aspirante $resultado) {
            return $resultado->edad;
        });*/
        $labels = collect(array_column($rangos, 'name'));


        /*$datasets = new Collection([
            $resultados->map(function(Aspirante $resultado) {
                return [$resultado->edad, intval($resultado->total), true];
            })
        ]);*/

        $valores = [];
        foreach ($rangos as $rango) {
            $cuantos = $resultados->filter(fn($item) => $item->edad >= $rango['min'] && $item->edad <= $rango['max']);
            $valores [] =[$rango['name'], intval(count($cuantos))];
        }
        $datasetLocal[] = [ 'data' => $valores ];
        $datasets = new Collection($datasetLocal);

        return (new ChartComponentData($labels, $datasets));
    }
}
