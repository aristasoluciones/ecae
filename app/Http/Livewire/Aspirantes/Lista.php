<?php

namespace App\Http\Livewire\Aspirantes;


use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Aspirante;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class Lista extends DataTableComponent
{
    protected $model = Aspirante::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
        $this->setConfigurableAreas([
            'before-tools' => [
                'components.button',
               [
                   'type'    =>'button',
                   'route'   =>'aspirante',
                   'theme'   => 'primary',
                   'position'=> 'justify-content-end',
                   'class'   => 'btn-circle',
                   'title'   => 'Agregar aspirante',
                   'label'   => 'Agregar',
               ],
            ],
            'before-toolbar' =>'components.loading'
        ]);
    }

    public function columns(): array
    {

        return [
            Column::make('#Folio', 'id'),
            Column::make('Nombre','nombre')->sortable(),
            Column::make('Primer apellido', 'apellido1'),
            Column::make('Segundo apellido', 'apellido2'),
            Column::make('Sexo', 'genero'),
            Column::make('Edad', 'edad'),
            Column::make('Municipio', 'municipio'),
            ComponentColumn::make('acciones', 'id')
                ->component('acciones')
                ->attributes(fn($value) => ['id' => $value]),
        ];
    }
}
