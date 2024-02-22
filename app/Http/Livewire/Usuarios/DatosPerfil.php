<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class DatosPerfil extends Component
{
    use WithFileUploads;
    public $foto;

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    protected function rules() {

        return [
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:700'
        ];
    }

    public function updatedFoto($value) {

        $this->guardarFoto();
    }

    public $messages = [
        'foto.mimes' => 'La imagen debe ser uno de los siguientes formatos jpg,png o jpeg',
        'foto.max' => 'La imagen no debe pesar más de 700KB'
    ];

    public function render()
    {
        return view('livewire.usuarios.datos-perfil');
    }

    public function guardarFoto() {

        $user = auth()->user();
        $nameFile = strtoupper("PERFIL-".$user->id).".".$this->foto->getClientOriginalExtension();
        if($this->foto->storeAs('public/perfil', $nameFile)) {
            $user->foto = 'perfil/'.$nameFile;
            $user->save();
            $this->emit('swal:alert', [
                'icon'    => 'success',
                'title'   => 'Imagen de perfil actualizado',
                'timeout' => 5000
            ]);
            $this->redirectRoute('perfil');
        } else {
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error al actualizar imagen de perfil',
                'timeout' => 5000
            ]);
        }
    }
}
