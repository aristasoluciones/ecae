<?php

namespace App\Http\Livewire\Aspirantes;


use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;;

use App\Models\Aspirante;
use App\Models\Documento;
use App\Models\Expediente as ExpedienteModel;
use Barryvdh\DomPDF\Facade\Pdf;

class Expediente extends Component
{
    use AuthorizesRequests;

    public $aspirante;

    public $expedientes;

    protected $documentos;

    public function updated($field) {
        return $this->validateOnly($field);
    }
    public function messages() {
        return [
            '*.required' => 'Este campo es obligatorio',
            '*.required_if' => 'Este campo es obligatorio'
        ];
    }


    public function mount(Aspirante $aspirante) {

        $this->aspirante = $aspirante;
        $this->cargarExpedientes();
    }
    public function cargarExpedientes() {

        $catalogoDocs = Documento::all();
        $this->aspirante->load('expedientes');

        $expedientes = $this->aspirante->expedientes->toArray();
        $expedientes = array_column($expedientes, 'documento_id');

        $docs = array_filter($catalogoDocs->toArray(), fn($documento) => !in_array($documento['id'], $expedientes));

        $aVincular = [];
        foreach ($docs as $doc) {

            $cad['documento_id'] =  $doc['id'];
            $cad['nombre']       =  $doc['nombre'];
            $aVincular[] =  $cad;
        }

        if(count($aVincular))
           $this->aspirante->expedientes()->createMany($aVincular);

        $this->aspirante->load('expedientes');
        $this->expedientes = $this->aspirante->expedientes;
    }

    public function render()
    {
        return view('livewire.aspirantes.expediente');
    }

    public function handlerSave() {


       $this->emit('confirmar', [
            'icon'    => 'question',
            'title'   => 'Confirmar información',
            'text'    => '¿Esta seguro de enviar sus datos?',
            'confirmText' => $this->aspirante_id > 0 ? 'Actualizar' : 'Guardar',
            'method'  => $this->aspirante_id > 0 ? "actualizar" : "guardar",
        ]);
    }

    public function notificar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);

        $this->render();

    }

    public function validar($id, $campo) {

        $expe = ExpedienteModel::findOrFail($id);
        switch ($campo) {
            case 'original':  $expe->mostro_original = !$expe->mostro_original; break;
            case 'copia':     $expe->entrego_copia   = !$expe->entrego_copia; break;
        }
        $expe->save();
        $this->cargarExpedientes();
    }

    public function generarAcuse() {

        $content = Pdf::loadView('aspirantes.documentacion', ['aspirante' => $this->aspirante])->setPaper('letter')->output();
        return response()->streamDownload(fn() => print($content), 'REL-DOCUMENTACION-'.$this->aspirante->clave_elector.'.pdf');
    }
}
