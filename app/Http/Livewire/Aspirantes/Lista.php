<?php

namespace App\Http\Livewire\Aspirantes;


use App\Exports\AspirantesExport;
use App\Mail\RegistroShipped;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Aspirante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Lista extends DataTableComponent
{
    protected $model = Aspirante::class;

    public $municipios;
    public $edades;
    public $generos;
    public $estatuses;

    public $fFolio;
    public $fNombre;
    public $fMunicipio;
    public $fEdad;
    public $fGenero;
    public $fEstatus;


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchVisibilityStatus(false);
        $this->setColumnSelectDisabled();
        $this->setPerPageAccepted([10, 25, 50, 100,500,1000,2000,3000]);
        $this->setAdditionalSelects(['id','estatus','apellido1','apellido2','sede','email']);
        $this->setConfigurableAreas([
            'before-tools' => [
                'aspirantes.busqueda',
               [
                   'type'    =>'button',
                   'route'   =>'registro',
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

        $sedes = [];

        $queryMun = Aspirante::query()
            ->select('municipio', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes')) {
            $sedes = [auth()->user()->sede];
            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
            }
            $queryMun->whereIn('sede',$sedes);
        }


        $this->municipios = $queryMun->groupBy('municipio')
                                     ->orderBy('municipio')
                                     ->get();

        $queryEdad = Aspirante::query()
            ->select('edad', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryEdad->whereIn('sede',$sedes);

        $this->edades = $queryEdad->groupBy('edad')
                                  ->orderBy('edad')
                                  ->get();

        $queryGenero = Aspirante::query()
            ->select('genero', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryGenero->whereIn('sede', $sedes);

        $this->generos = $queryGenero->groupBy('genero')
                                     ->orderBy('genero')
                                     ->get();

        $queryEstatus = Aspirante::query()
            ->select('estatus', DB::raw('count(id) as total'));

        if (auth()->user()->hasRole('odes'))
            $queryEstatus->whereIn('sede',$sedes);

        $this->estatuses = $queryEstatus->groupBy('estatus')
                                        ->orderBy('estatus')
                                        ->get();

    }

    public function columns(): array
    {

        return [
            Column::make('#Folio', 'id'),
            Column::make('Clave elector','clave_elector')->format(fn($value) => mb_strtoupper($value))->searchable(),
            Column::make('Nombre','nombre')->format(fn($value,$row) => mb_strtoupper($row->nombre." ".$row->apellido1." ".$row->apellido2))->searchable(),
            Column::make('Género', 'genero')->format(fn($value) => strtoupper($value))->searchable(),
            Column::make('Edad', 'edad')->searchable(),
            Column::make('Sede', 'sede')->format(fn($value) => mb_strtoupper($value))->searchable(),
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
            $sedes = [auth()->user()->sede];
            if(auth()->user()->sede === 'Consejo Municipal Electoral de Huixtán') {
                array_push($sedes, 'Consejo Municipal Electoral de Oxchuc');
            }
            $query->whereIn('sede',$sedes);
        }

        if($this->fFolio)
            $query->where('id', $this->fFolio);

        if($this->fNombre)
            $query->whereRaw('CONCAT_WS(" ",nombre,apellido1,apellido2) LIKE ?', ['%'.$this->fNombre.'%']);

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

    public function enviarAcuses($id) {

        try {
            $aspirante =  Aspirante::findOrFail($id);
            $aspirante->load('expedientes');

            if(strlen($aspirante->email) > 0) {
                $files = [
                    'SOLICITUD'.strtoupper($aspirante->clave_elector) => Pdf::loadView('aspirantes.acuse', ['aspirante' => $aspirante])->setPaper('letter')->output(),
                    'DECLARATORIA_'.strtoupper($aspirante->clave_elector) => Pdf::loadView('aspirantes.declaratoria', ['aspirante' => $aspirante])->setPaper('letter')->output(),
                ];
                if (count($aspirante->expedientes)>0)
                    $files['DOCUMENTACION_'.strtoupper($aspirante->clave_elector)] = Pdf::loadView('aspirantes.documentacion', ['aspirante' => $aspirante])->setPaper('letter')->output();
                Mail::to($aspirante->email)->send(new RegistroShipped($files));
            }
            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Se han enviado los documentos.',
                'timeout' => 5000
            ]);
        } catch(\Throwable $e) {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ha ocurrido un error en el envío. '.$e->getMessage(),
                'timeout' => 5000
            ]);
        }
    }

    public function exportar() {
        $builder = $this->getBuilder();
        $rows =  $builder->get();
        return Excel::download(new AspirantesExport($rows), 'aspirantes_registrados.xlsx');
    }

}
