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
        $resultados = Aspirante::query()
            ->select('edad', DB::raw('count(id) as total'))
            ->groupBy('edad')
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
