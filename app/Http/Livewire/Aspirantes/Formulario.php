<?php

namespace App\Http\Livewire\Aspirantes;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Session\Store;
use Illuminate\Validation\Rule;
use Livewire\Component;

use App\Models\Aspirante;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Formulario extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public $candidato;
    public $candidato_id;
    public $clave_elector;

    public $nombre;
    public $apellido1;
    public $apellido2;

    public $email;
    public $generos;
    public $edad;
    public $foto;
    public $fotoBase64;
    public $medios_contacto;
    public $maximo_estudio;
    public $maximo_estudio_estatus;
    public $historia_profesional;
    public $trayectoria_politica;
    public $otra_formacion;
    public $porque_desea_el_cargo;
    public $propuesta1;
    public $propuesta2;
    public $propuesta_gen_disc;
    public $partido;
    public $distrito;
    public $tipo_candidatura;
    public $cargo;
    public $respuestas;

    public $uploadedFoto = false;

    //CATALOGOS
    public $grados;
    public $estatusGrados;
    public $tiposDeMedio;
    public $pueblos;
    public $cargos;
    public $tiposCandidatura;
    public $partidos;
    public $cuestionarios;
    public $paises;

    protected function rules() {

        return [
            'clave_elector'     => ['required', Rule::unique('candidatos')->ignore($this->candidato_id),'size:20'],
            'nombre'            => 'required|string',
            'apellido1'         => 'required|string',
            'apellido2'         => 'required|string',
            'edad'              => 'required|integer',
            'sexo'              => 'required|string',
            'cargo'             => 'required|string',
            'foto'              =>  $this->validarFoto(),
            'partido'           => 'required|string',
            'distrito'          => 'nullable|string',
            'tipo_candidatura'  => 'required|string',
            'medios_contacto'   => 'nullable|array',
            'maximo_estudio'    => 'required|string',
            'maximo_estudio_estatus' => 'required|string',
            'historia_profesional'   => 'required|string',
            'trayectoria_politica'   => 'required|string',
            'otra_formacion'         => 'nullable|array',
            'porque_desea_el_cargo'  => 'nullable|string|min:280|max:1600',
            'propuesta1'             => 'nullable|string|min:280|max:1600',
            'propuesta2'             => 'nullable|string|min:280|max:1600',
            'propuesta_gen_disc'     => 'nullable|string|min:280|max:1600',
        ];
    }

    public $messages = [
        'respuestas.*.required' => 'Es necesario responder esta pregunta',
    ];

    public function updatedFoto() {

        if($this->foto === $this->candidato->foto && strlen($this->foto) > 0)
            $this->uploadedFoto = is_file(storage_path($this->candidato->foto));
        else
            $this->uploadedFoto = false;
    }

    private function validarFoto() {

        return $this->foto !== $this->candidato->foto ? 'required|file|mimes:jpg,png|max:1024' : 'nullable';
    }
    public function mount(Aspirante $candidato) {

        $this->grados         =  config('constants.grados');
        $this->estatusGrados  =  config('constants.estatus_grados');
        $this->tiposDeMedio   =  config('constants.tipos_de_medio');
        $this->pueblos        =  config('constants.pueblos');
        $this->cargos         =  config('constants.cargos');
        $this->sexos          =  config('constants.sexos');
        $this->sexos1          =  config('constants.sexos1');
        $this->distritos      =  config('constants.distritos');
        $this->partidos       =  config('constants.partidos');
        $this->cuestionarios  =  config('constants.cuestionarios');
        $this->paises         =  config('constants.paises');
        $this->tiposCandidatura   =  config('constants.tipos_candidatura');

        $this->resetearCandidato();
        $respuestas = [];

        if($candidato) {

            $this->candidato = $candidato;
            $this->candidato_id = $candidato->id;
            $this->clave_elector = $candidato->clave_elector;
            $this->nombre = $candidato->nombre;
            $this->apellido1 = $candidato->apellido1;
            $this->apellido2 = $candidato->apellido2;
            $this->edad = $candidato->edad;
            $this->foto = is_file(storage_path('app/public/'.$this->candidato->foto)) ? $this->candidato->foto : null;
            $this->sexo = $candidato->sexo;
            $this->cargo = $candidato->cargo;
            $this->partido = $candidato->partido;
            $this->distrito = $candidato->distrito;
            $this->tipo_candidatura = $candidato->tipo_candidatura;
            $this->medios_contacto = $candidato->medios_contacto ?? [];
            $this->otra_formacion = $candidato->otra_formacion ?? [];
            $this->maximo_estudio = $candidato->maximo_estudio;
            $this->maximo_estudio_estatus = $candidato->maximo_estudio_estatus;
            $this->historia_profesional = $candidato->historia_profesional;
            $this->trayectoria_politica = $candidato->trayectoria_politica;
            $this->propuesta1 = $candidato->propuesta1;
            $this->propuesta2 = $candidato->propuesta2;
            $this->propuesta_gen_disc    = $candidato->propuesta_gen_disc;
            $this->porque_desea_el_cargo = $candidato->porque_desea_el_cargo;

            $this->uploadedFoto = strlen($this->foto) > 0;
            $this->fotoBase64   = strlen($this->foto) > 0 ? base64_encode(Storage::get('public/'.$this->foto)) : null;

        }

        $this->fill([
            'medios_contacto' =>[],
            'otra_formacion' =>[],
        ]);
    }

    public function render()
    {
        return view('livewire.aspirantes.formulario')
            ->extends('adminlte::page')
            ->section('content');
    }

    public function guardar() {

        $data     = $this->validate();
        $dataFill =  $data;

        $nameFoto = uniqid().".".$this->foto->getClientOriginalExtension();
        if(!is_dir(storage_path('app/public/perfil')))
            mkdir(storage_path('app/public/perfil'));

        $this->foto->storeAs('public/perfil',$nameFoto);
        $dataFill['foto'] =  'perfil/'.$nameFoto;

        $dataFill['user_id'] = auth()->user() ? auth()->user()->id : 1;
        $candidato = Aspirante::create($dataFill);

        $this->notificar('success', 'Registro guardado');
        $this->redirectRoute('gubernaturas');

    }

    public function handlerSave() {

        $text = "<p><img src=''></p>";
        $text .= "<p class='text-justify'><b>Nombre: </b>".$this->nombre." ".$this->apellido1." ".$this->apellido2."</p>";
        $text .= "<p class='text-justify'><b>Cargo: </b>".$this->cargo."</p>";
        $text .= "<p class='text-justify'><b>Nombre: </b>".$this->nombre." ".$this->apellido1." ".$this->apellido2."</p>";
        $text .= "<p class='text-justify'><b>Cargo: </b>".$this->cargo."</p>";
        $text .= "<p class='text-justify'><b>Nombre: </b>".$this->nombre." ".$this->apellido1." ".$this->apellido2."</p>";
        $text .= "<p class='text-justify'><b>Cargo: </b>".$this->cargo."</p>";
        $text .= "<p class='text-justify'><b>Nombre: </b>".$this->nombre." ".$this->apellido1." ".$this->apellido2."</p>";
        $text .= "<p class='text-justify'><b>Cargo: </b>".$this->cargo."</p>";
        $text .= "<p class='text-justify'><b>Nombre: </b>".$this->nombre." ".$this->apellido1." ".$this->apellido2."</p>";
        $text .= "<p class='text-justify'><b>Cargo: </b>".$this->cargo."</p>";


       $this->emit('confirmar', [
            'icon'    => 'question',
            'title'   => 'Confirmar información',
            'text'    => $text,
            'confirmText' => $this->candidato_id > 0 ? 'Actualizar' : 'Guardar',
            'method'  => $this->candidato_id > 0 ? "actualizar" : "'guardar'",
        ]);
    }
    public function actualizar() {


        $data     = $this->validate();
        $dataFill =  $data;
        unset($dataFill['respuestas']);

        if($this->foto !== $this->candidato->foto) {

            if(!is_dir(storage_path('app/public/perfil')))
                mkdir(storage_path('app/public/perfil'));

            if(is_file(storage_path('app/public/'.$this->candidato->foto)))
                unlink(storage_path('app/public/'.$this->candidato->foto));

            $nameFoto = uniqid() . "." . $this->foto->getClientOriginalExtension();
            $this->foto->storePubliclyAs('public/perfil', $nameFoto);
            $dataFill['foto'] = 'perfil/' . $nameFoto;
        }

        Aspirante::where('id', $this->candidato_id)->update($dataFill);

        $candidato = Aspirante::find($this->candidato_id);
        $this->syncRespuestas($candidato, $data['respuestas']);

        $this->notificar('success', 'Registro actualizado');
    }

    public function agregarMedio() {

        $medios = is_array($this->medios_contacto) ? $this->medios_contacto : [];
        array_push($medios,['tipo' => '', 'texto' => '']);
        $this->medios_contacto = $medios;
    }

    public function eliminarMedio($index) {

        $medios = $this->medios_contacto ?? [];
        $medios =  array_filter($medios, fn($item, $idx) => $index != $idx, ARRAY_FILTER_USE_BOTH);
        $this->medios_contacto = $medios;
    }

    public function agregarFormacion() {

        $formaciones = is_array($this->otra_formacion) ? $this->otra_formacion : [];
        array_push($formaciones,['descripcion' => '']);
        $this->otra_formacion = $formaciones;
    }

    public function eliminarFormacion($index) {

        $formaciones = $this->otra_formacion ?? [];
        $formaciones =  array_filter($formaciones, fn($item, $idx) => $index != $idx, ARRAY_FILTER_USE_BOTH);
        $this->otra_formacion = $formaciones;
    }

    public function notificar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);

        $this->render();

    }

    private function resetearCandidato() {

        $this->resetExcept([
            'filterCount',
            'id',
            'grados',
            'estatusGrados',
            'pueblos',
            'tiposDeMedio',
            'tiposCandidatura',
            'sexos',
            'sexos1',
            'distritos',
            'cargos',
            'partidos',
            'cuestionarios',
            'paises',
        ]);

        $this->fill([
            'medios_contacto' =>[],
            'otra_formacion' =>[],
        ]);
    }

    private function iniciarRespuestas($cuestionarios, array $respuestas = []) {

        foreach ($cuestionarios as $cuestionario) {
            foreach ($cuestionario['preguntas'] as $kpregunta => $pregunta) {
                $this->respuestas['respuesta-'.$cuestionario['clave']."-".$kpregunta] = $respuestas['respuesta-'.$cuestionario['clave']."-".$kpregunta] ?? null;
            }
        }
    }

    private function syncRespuestas(Aspirante $candidato, $respuestas) {

        $resps = [];
        foreach ($respuestas as $kresp => $resp) {

            $cad['pregunta']   = $kresp;
            $cad['respuesta']  = $resp;
            $resps[] = $cad;
        }

        $candidato->respuestas()->delete();
        $candidato->respuestas()->createMany($resps);
    }
}
