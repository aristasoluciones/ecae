<?php

namespace App\Http\Livewire\Charts;

use App\Charts\GeneroChart;
use App\Models\Aspirante;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Genero extends ChartComponent
{

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
        return GeneroChart::class;
    }

    /**
     * @return ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {

        $query = Aspirante::query();
        $query->select('genero','ultimo_grado_estudio', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes')) {

            $sedes = [auth()->user()->sede];
            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
            }
            $query->whereIn('sede',$sedes);
        }
        if($this->municipio)
            $query->where('municipio',$this->municipio);

        $resultados = $query->groupBy('genero','ultimo_grado_estudio')
            ->orderBy('genero')
            ->get();

        $labels = $resultados->map(function(Aspirante $resultado) {
            return $resultado->ultimo_grado_estudio;
        });

        $generos = $resultados->map(function(Aspirante $resultado) {
            return $resultado->genero;
        });
        $labels = $labels->uniqueStrict()->values();
        $generos = $generos->uniqueStrict()->values();

        $valores = [];
        foreach ($generos as $genero) {
            $valores [] =[
                'name' => $genero,
                'data' => $this->crearData($labels, $genero, $resultados),
            ];
        }
        $datasets = new Collection($valores);


        return (new ChartComponentData($labels, $datasets));
    }

    public function crearData($labels, $genero, $resultados) {
        $data = [];
        $resFiltrado = $resultados->filter(fn($v) => $v->genero === $genero );
        foreach ($labels as $label) {
            $encon = $resFiltrado->first(fn($res) => $res->ultimo_grado_estudio === $label);
            array_push($data, $encon ? $encon->total: 0);
        }
        return $data;
    }
}
