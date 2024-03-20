<?php

namespace App\Charts;

use App\Support\Livewire\ChartComponentData;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class ChartEdad extends Chart
{
    /**
     * GeneroChart constructor.
     *
     * @param ChartComponentData $data
     */
    public function __construct(ChartComponentData $data)
    {
        parent::__construct();

        $this->loader(false);

        $this->options([
            'chart' => [
               'styledMode' => true,
               'type' => 'bar',
            ],
            'yAxis' => [
                'title' => [
                    'text' => 'Número de aspirantes registrados',
                ],
                'min'=> 0,
            ],
            'xAxis' => [
               'type' => 'category',
                'labels' => [
                    'enabled' => true,
                    'format' => '{text} años'
                ],
                'scrollbar' => [
                    'enabled' => true,
                ],
                'min' => 0,
                'max' => 10,
                'tickLength' => 0,
            ],
            'legend' => [
                'enabled' => false,
            ],
            'plotOptions' => [
                'series' => [
                    'pointWidth' => 18,
                    'pointPadding' => 0.15,
                ]
            ]
        ]);
        $this->title('Aspirantes registrados por rango de edad');
        $this->height(600);

        $this->labels($data->labels());


        $this->dataset('Edad', "column", $data->datasets()[0]['data'])->options([
            'keys' => ['name','y'],
            'borderRadius' => 5,
            'colorByPoint' => true,
            'dataLabels' => [
                'enabled' => true,
                'format' => '{y} aspirantes'
            ],
        ]);
    }
}
