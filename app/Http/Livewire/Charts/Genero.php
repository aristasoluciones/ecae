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
        $resultados = Aspirante::query()
            ->select('genero','ultimo_grado_estudio', DB::raw('count(id) as total'))
            ->groupBy('genero','ultimo_grado_estudio')
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