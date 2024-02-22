<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CambiarPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $viewPassword = false;

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    protected function rules() {

        return [
            'password'         => 'required|confirmed',
        ];
    }

    public $messages = [
        'password.required'  => 'El campo Nueva Contraseña es requerido',
        'password.confirmed'  => 'La contraseña no coincide con la confirmación',
    ];

    public function render()
    {
        return view('livewire.usuarios.cambiar-password');
    }

    public function togglePassword() {

        $this->viewPassword = !$this->viewPassword;
    }

    public function handlerGuardar() {

        $rules = $this->rules();
        $this->validate($rules);
        $this->emit('modal:show', '#modal-confirmar');
    }

    public function guardar() {

        $data = $this->validate();
        $user = Auth()->user();
        $user->password =  Hash::make($data['password']);
        $user->save();
        $this->reset(['password','password_confirmation']);
        $this->emit('modal:hide', '#modal-confirmar');
        $this->emit('modal:show', '#modal-logout');
    }
}
