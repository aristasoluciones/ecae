<?php

namespace App\Support\Livewire;

use Illuminate\View\View;
use Livewire\Component;

abstract class ChartComponent extends Component
{
    /**
     * @var string|null
     */
    public ?string $chart_id = null;
    public ?string $municipio = null;

    /**
     * @var string|null
     */
    public ?string $chart_data_checksum = null;

    /**
     * @return string
     */
    protected abstract function chartClass(): string;

    /**
     * @return ChartComponentData
     */
    protected abstract function chartData(): ChartComponentData;

    /**
     * @return string
     */
    protected abstract function view(): string;

    /**
     * @return View
     */
    public function render(): View
    {
        $chart_data = $this->chartData();

        if(!$this->chart_id)
        {
            $chart_class = $this->chartClass();

            $chart = new $chart_class($chart_data);

            $this->chart_id = $chart->id;
        }

        elseif($chart_data->checksum()!==$this->chart_data_checksum || $this->municipio)
        {

            $this->emit('chartUpdate', $this->chart_id, $chart_data->labels(), $chart_data->datasets());
        }

        $this->chart_data_checksum = $chart_data->checksum();

        return view($this->view(), [
            'chart' => ($chart ?? null),
        ]);
    }
}
