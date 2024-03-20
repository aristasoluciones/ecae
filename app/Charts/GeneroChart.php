<?php

namespace App\Charts;

use App\Support\Livewire\ChartComponentData;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class GeneroChart extends Chart
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
                    'text' => 'Numero de aspirantes registrados',
                ],
                'min'=> 0,
            ],
            'xAxis' => [
               'type' => 'category',
               'labels' => [
                    'enabled' => true,
                ]
            ],
            'legend' => [
                'enabled' => count($data->datasets()) > 0,
            ],
            'plotOptions' => [
                'series' => [
                    'pointWidth' => 18,
                    'pointPadding' => 4,
                ]
            ]
        ]);
        $this->title('Aspirantes registrados por grado de estudio y genero');
        $this->height(600);

        $this->labels($data->labels());

        if(count($data->datasets())>0) {
            foreach ($data->datasets() as $dataset) {
                $this->dataset($dataset['name'], "bar", $dataset['data']);
            }
        } else {
            $this->dataset('', "column", collect([]));
        }
    }
}
