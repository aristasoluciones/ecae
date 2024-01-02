<?php

namespace App\Http\Livewire\Aspirantes;


use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Aspirante;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\DB;

class Lista extends DataTableComponent
{
    protected $model = Aspirante::class;

    public $municipios;
    public $edades;
    public $generos;
    public $estatuses;

    public $fMunicipio;
    public $fEdad;
    public $fGenero;
    public $fEstatus;


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchVisibilityStatus(false);
        $this->setColumnSelectDisabled();
        $this->setAdditionalSelects(['id','estatus','apellido1','apellido2','sede']);
        $this->setConfigurableAreas([
            'before-tools' => [
                'aspirantes.busqueda',
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

    public function mount() {

        $queryMun = Aspirante::query()
            ->select('municipio', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryMun->where('sede','=',auth()->user()->sede);

        $this->municipios = $queryMun->groupBy('municipio')
                                     ->orderBy('municipio')
                                     ->get();

        $queryEdad = Aspirante::query()
            ->select('edad', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryEdad->where('sede','=',auth()->user()->sede);

        $this->edades = $queryEdad->groupBy('edad')
                                  ->orderBy('edad')
                                  ->get();

        $queryGenero = Aspirante::query()
            ->select('genero', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryGenero->where('sede','=',auth()->user()->sede);


        $this->generos = $queryGenero->groupBy('genero')
                                     ->orderBy('genero')
                                     ->get();

        $queryEstatus = Aspirante::query()
            ->select('estatus', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryEstatus->where('sede','=',auth()->user()->sede);

        $this->estatuses = $queryEstatus->groupBy('estatus')
                                        ->orderBy('estatus')
                                        ->get();

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

        if($this->fMunicipio)
            $query->where('municipio', $this->fMunicipio);

        if($this->fEdad)
            $query->where('edad', $this->fEdad);

        if($this->fGenero)
            $query->where('genero', $this->fGenero);

        if($this->fEstatus)
            $query->where('estatus', $this->fEstatus);

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
        return response()->streamDownload(fn() => print($content), 'SOLICITUD-'.strtoupper($aspirante->clave_elector).'.PDF');
    }
}
