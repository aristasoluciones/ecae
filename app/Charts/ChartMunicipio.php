<?php

namespace App\Charts;

use App\Support\Livewire\ChartComponentData;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class ChartMunicipio extends Chart
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
               'styledMode' => false,
               'zoomType' => 'x',
            ],
            'yAxis' => [
                'title' => [
                    'text' => 'Número de aspirantes registrados',
                ],
                'min'=> 0,
                'labels'=> [
                    'overflow' => 'justify'
                ]
            ],
            'xAxis' => [
               'type' => 'category',
                'labels' => [
                    'enabled' => true,
                ],
                'scrollbar' => [
                    'enabled' => true,
                ],
                'min' => 0,
                'max' => 25,
                'tickLength' => 0,
            ],
            'subtitle' => [
                'text' => 'Grafica de aspirantes por municipio',
            ],
            'legend' => [
                'enabled' => false,
            ],
            'plotOptions' => [
                'series' => [
                    'pointWidth' => 18,
                    'pointPadding' =>0.20
                ]
            ]
        ]);
        $this->title('Grafica por municipio');
        $this->labels($data->labels());
        $this->height(800);

        $this->dataset('Municipios', "bar", $data->datasets()[0])->options([
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
