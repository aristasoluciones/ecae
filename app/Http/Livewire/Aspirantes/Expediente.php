<?php

namespace App\Http\Livewire\Aspirantes;


use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;;

use App\Models\Aspirante;
use App\Models\Documento;
use App\Models\Expediente as ExpedienteModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Expediente extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public $aspirante;

    public $expedientes;

    protected $documentos;

    public $documentacion;

    public $documentacionBase64;

    public function updated($field) {
        return $this->validateOnly($field);
    }

    public function updatedDocumentacion($value) {

        $this->emit('modal:show', '#modal-confirmar-evidencia');
    }

    protected function rules() {
        return [
            'documentacion' => 'nullable|file|mimes:pdf|max:7000',
        ];
    }
    protected function messages() {
        return [
            '*.required' => 'Este campo es obligatorio',
            '*.required_if' => 'Este campo es obligatorio'
        ];
    }


    public function mount(Aspirante $aspirante) {

        $this->aspirante = $aspirante;
        if(File::isFile(storage_path('app/'.$this->aspirante->documentacion))) {
            $this->documentacionBase64 =  base64_encode(file_get_contents(storage_path('app/'.$this->aspirante->documentacion)));
        }

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


    public function guardarEvidencia() {

        $nameFile = strtoupper("EVIDENCIA-".$this->aspirante->id."-".$this->aspirante->clave_elector).".PDF";
        if($this->documentacion->storeAs('evidencias', $nameFile)) {
            $this->aspirante->documentacion = 'evidencias/'.$nameFile;
            $this->aspirante->save();
            if(File::isFile(storage_path('app/'.$this->aspirante->documentacion))) {
                $this->documentacionBase64 =  base64_encode(file_get_contents(storage_path('app/'.$this->aspirante->documentacion)));
            }
            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Archivo guardado correctamente',
                'timeout' => 5000
            ]);
        } else {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error al guardar archivo',
                'timeout' => 5000
            ]);
        }
        $this->emit('modal:hide', '#modal-confirmar-evidencia');

    }

    public function handlerEliminar() {
        $this->emit('modal:show', '#modal-confirmar-eliminar-evidencia');
    }
    public function eliminarEvidencia() {

        try {
            if(File::delete(storage_path('app/'.$this->aspirante->documentacion))) {
                $this->aspirante->documentacion = null;
                $this->aspirante->save();
                $this->documentacionBase64 = null;
            }

            $this->emit('modal:hide', '#modal-confirmar-eliminar-evidencia');
            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Archivo eliminado',
                'timeout' => 5000
            ]);

        } catch (\Throwable $e) {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error al tratar de eliminar el archivo',
                'timeout' => 5000
            ]);
        }
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
