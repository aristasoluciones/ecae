<?php

namespace App\Http\Livewire\Aspirantes;


use App\Exports\AspirantesExport;
use App\Exports\EntrevistadosExport;
use App\Exports\EvaluadosExport;
use App\Exports\ResultadosFinalesExport;
use App\Mail\RegistroShipped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
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

    public $registroEliminar;

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
        $this->setAdditionalSelects(['id','estatus','apellido1','apellido2','sede','email','documentacion','created_at']);
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
                   'icon'   => 'fa fa-plus',
               ],
            ],
            'before-toolbar' =>'components.loading'
        ]);

        if(auth()->user()->hasRole(['superadministrador','administrador'])) {
            $this->setBulkActions([
                'openNotificar' => 'Emitir comunicado'
            ]);
        }
    }
    public function customView(): string
    {
        return 'aspirantes.modal';
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
            $query->whereRaw('id = ?', [$this->fFolio]);

        if($this->fNombre)
            $query->whereRaw('CONCAT_WS(" ",nombre,apellido1,apellido2) LIKE ?', ['%'.$this->fNombre.'%']);

        if($this->fMunicipio)
            $query->whereRaw('municipio = ?', [$this->fMunicipio]);

        if($this->fEdad)
            $query->whereRaw('edad = ?', [$this->fEdad]);

        if($this->fGenero)
            $query->whereRaw('genero = ?', [$this->fGenero]);

        if($this->fEstatus)
            $query->whereRaw('estatus = ?', [$this->fEstatus]);

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
        $rows =  $this->getRows();
        return Excel::download(new AspirantesExport($rows), 'aspirantes_registrados.xlsx');
    }

    public function openNotificar() {
        $rows = count($this->getSelected()) > 0 ? Aspirante::whereIn('id', $this->getSelected())->get() : $this->getRows();
        $todos = count($this->getSelected()) <= 0;
        $rows = $rows->filter(fn($row) => strlen($row->email));

        $this->emitTo('aspirantes.notificar', 'resetear');
        $this->emitTo('aspirantes.notificar', 'setFiltro',$rows,$todos);
        $this->emit('modal:show', '#modal-notificar');
    }

    public function openCapturaEvaluacion($id) {

        $this->emitTo('aspirantes.evaluacion', 'resetear');
        $this->emitTo('aspirantes.evaluacion', 'setAspirante',$id);
        $this->emit('modal:show', '#modal-evaluacion');
    }

    public function descargarEvidencia($id) {

        $aspirante =  Aspirante::find($id);

        try {

            if(File::isFile(storage_path('app/'.$aspirante->documentacion))) {
                $name = implode('_', [
                    $aspirante->id,
                    str_replace(' ', '_', $aspirante->municipio),
                    str_replace(' ', '_', $aspirante->apellido1."_".$aspirante->apellido2."_".$aspirante->nombre),
                ]);
                $name = htmlspecialchars(mb_strtoupper($name)).".PDF";
                return response()->download(storage_path('app/'.$aspirante->documentacion), $name);
            } else {
                $this->emit('swal:alert', [
                    'icon'    => 'error',
                    'title'   => 'Ocurrio un error al descargar',
                    'timeout' => 5000
                ]);
            }
        } catch (\Throwable $e) {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error al descargar',
                'timeout' => 5000
            ]);
        }
    }

    public function exportarEvaluados() {

        if (!$this->fMunicipio) {

            $this->emit('swal:alert', [
                'icon'    => 'warning',
                'title'   => 'Debe seleccionar un municipio.',
                'timeout' => 5000
            ]);
            return false;
        }
        $rows =  $this->getRows();
        $rows =  $rows->filter(fn($item) => $item->evaluacion);
        $rows->append('calificacion_evaluacion');

        $rows = $rows->sortByDesc('calificacion_evaluacion');

        $municipio = $this->fMunicipio;
        if (auth()->user()->hasRole('odes')) {
            $municipio = !$municipio ? str_replace('Consejo Municipal Electoral de ', '',auth()->user()->sede) : $municipio;
        }

        return Excel::download(new EvaluadosExport($rows, $municipio), 'CALIFICACION_EXAMEN_SEL_Y_CAEL.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function exportarEntrevistados() {

        if (!$this->fMunicipio) {

            $this->emit('swal:alert', [
                'icon'    => 'warning',
                'title'   => 'Debe seleccionar un municipio.',
                'timeout' => 5000
            ]);
            return false;
        }
        $rows =  $this->getRows();
        $rows =  $rows->filter(fn($item) => $item->entrevista);
        $rows->append('calificacion_entrevista');
        $rows = $rows->sortByDesc('calificacion_entrevista');

        $municipio = $this->fMunicipio;
        if (auth()->user()->hasRole('odes')) {
            $municipio = !$municipio ? str_replace('Consejo Municipal Electoral de ', '',auth()->user()->sede) : $municipio;
        }

        return Excel::download(new EntrevistadosExport($rows, $municipio), 'CALIFICACION_ENTREVISTA_SEL_Y_CAEL.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function exportarResultadosFinales() {

        if (!$this->fMunicipio) {

            $this->emit('swal:alert', [
                'icon'    => 'warning',
                'title'   => 'Debe seleccionar un municipio.',
                'timeout' => 5000
            ]);
            return false;
        }
        $rows =  $this->getRows();
        $rows =  $rows->filter(fn($item) => $item->entrevista && $item->evaluacion);
        $rows->append(['calificacion_entrevista','calificacion_evaluacion','calificacion_global']);
        $rows = $rows->sortByDesc('calificacion_global');

        $municipio = $this->fMunicipio;
        if (auth()->user()->hasRole('odes')) {
            $municipio = !$municipio ? str_replace('Consejo Municipal Electoral de ', '',auth()->user()->sede) : $municipio;
        }

        return Excel::download(new ResultadosFinalesExport($rows, $municipio), 'RESULTADOS_FINALES_SEL_Y_CAEL.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }


    public function openCapturaEntrevista($id) {

        $this->emitTo('aspirantes.entrevista', 'resetear');
        $this->emitTo('aspirantes.entrevista', 'setAspirante',$id);
        $this->emit('modal:show', '#modal-entrevista');
    }

    public function handlerEliminar($id) {

        $this->registroEliminar = Aspirante::find($id);
        $this->emit('modal:show', '#modal-confirmar-eliminar');
    }

    public function eliminar() {

        $this->registroEliminar->delete();

        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Registro eliminado.',
            'timeout' => 5000
        ]);
        $this->reset(['registroEliminar']);
        $this->emit('modal:hide', '#modal-confirmar-eliminar');
        $this->render();
    }
}
