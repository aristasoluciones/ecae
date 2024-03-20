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
               'styledMode' => true,
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
                ],
                'scrollbar' => [
                    'enabled' => true,
                ],
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
                    'pointPadding' => 4,
                ]
            ]
        ]);
        $this->title('Grafica por municipio');
        $this->height(600);

        $this->labels($data->labels());

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
