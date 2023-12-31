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
        return 'charts.genero';
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
            ->select('genero', DB::raw('count(id) as total'))
            ->groupBy('genero')
            ->orderBy('genero')
            ->get();


        $labels = $resultados->map(function(Aspirante $resultado) {
            return $resultado->genero;
        });

        $datasets = new Collection([
            $resultados->map(function(Aspirante $resultado) {
                return [$resultado->genero, intval($resultado->total), false];
            })
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
