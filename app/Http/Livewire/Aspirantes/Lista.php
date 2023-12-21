<?php

namespace App\Http\Livewire\Aspirantes;


use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Aspirante;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Barryvdh\DomPDF\Facade\Pdf;
class Lista extends DataTableComponent
{
    protected $model = Aspirante::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
        $this->setAdditionalSelects(['id','estatus','apellido1','apellido2','sede']);
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
            Column::make('Clave elector','clave_elector')->format(fn($value) => strtoupper($value))->searchable(),
            Column::make('Nombre','nombre')->format(fn($value,$row) => $row->nombre." ".$row->apellido1." ".$row->apellido2)->searchable(),
            Column::make('Genero', 'genero')->format(fn($value) => strtoupper($value))->searchable(),
            Column::make('Edad', 'edad')->searchable(),
            Column::make('Sede', 'sede')->format(fn($value) => strtoupper($value))->searchable(),
            Column::make('Estatus')
                ->label(function($row) {
                    return view('aspirantes.estatus')->with(['row' => $row]);
                }),
            Column::make('')
                ->label(function($row) {
                    return view('aspirantes.acciones')->with(['row' => $row]);
                }),

        ];
    }

    public function filtrar($query): Builder
    {
        if (auth()->user()->hasRole('odes')) {
            $query->where('sede','=',auth()->user()->sede);
        }

        return $query;
    }

    public function getRows()
    {
        $query = $this->baseQuery();
        $this->builder = $this->filtrar($query);
        return $this->executeQuery();
    }

    public function generarFicha($id) {

        $aspirante =  Aspirante::find($id);
        $content = Pdf::loadView('aspirantes.acuse', ['aspirante' => $aspirante])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'DECLARATORIA-'.strtoupper($aspirante->clave_elector).'.PDF');
    }
}
