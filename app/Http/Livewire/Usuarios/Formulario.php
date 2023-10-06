<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use App\Models\Candidato;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

class Formulario extends Component
{
    public $user;
    public $email;
    public $name;
    public $role;
    public $password;
    public $password_confirmation;

    public $roles;

    public $viewPassword = false;
    public $fromCandidato;

    protected $listeners = ['agregar','editar', 'crearUsuarioCandidato'];

    public $messages = [
        'name.required'  => 'El campo Nombre es requerido',
        'email.required' => 'El campo Correo electrónico es requerido',
        'role.required'  => 'El campo Rol es requerido',
        'password.required'  => 'El campo Contraseña es requerido',
        'password.confirmed'  => 'La contraseña no coincide con la confirmación',
        'password_confirmation.required'  => 'El campo Confirmar contraseña es requerido',
    ];

    protected function rules() {

        return [
            'email'            => ['required', Rule::unique('users')->ignore($this->user?->id)],
            'name'             => 'required|string',
            'role'             => 'required|string',
            'password'         => $this->validarPassword().'|confirmed',
            'password_confirmation' => $this->validarConfirmationPassword()
        ];
    }

    private function validarPassword() {

        return $this->user?->id > 0 ? 'nullable' : 'required';
    }

    private function validarConfirmationPassword() {

        return $this->user?->id > 0 ? 'nullable' : 'required';
    }

    public function togglePassword() {

        $this->viewPassword = !$this->viewPassword;
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }
    public function mount() {
        $this->roles    = Role::all();
        $this->partidos = config('constants.partidos');
    }

    public function render()
    {
        return view('livewire.usuarios.formulario',['fromCandidato' =>$this->fromCandidato]);
    }

    public function agregar() {

        $this->resetear();
        $this->emit('modal:show', '#modal-user');
    }

    public function editar($id) {

        $this->resetear();
        $this->user =  User::find($id);

        $this->name    = $this->user->name;
        $this->email   =  $this->user->email;
        $this->role    =  $this->user->roles[0]['name'] ?? null;

        $this->emit('modal:show', '#modal-user');
    }

    public function crearUsuarioCandidato($id) {
        $this->resetear();
        $this->fromCandidato = 1;
        $candidato = Candidato::find($id);

        if($candidato) {
            $this->user = User::where('email', $candidato->clave_elector)->first();
        }

        $this->name    = $this->user ? $this->user->name : $candidato->nombre." ".$candidato->apellido1." ".$candidato->apellido2;
        $this->email   = $this->user ? $this->user->email : $candidato->clave_elector;
        $this->role    = $this->user ? $this->user->roles[0]['name'] : 'candidato';

        $this->emit('modal:show', '#modal-user');
    }

    public function save() {

        $data = $this->validate();
        $dataFill =  $data;
        $mensaje = "Usuario actualizado";
        if(!$this->user) {
            $this->user = new User;
            $mensaje    = "Usuario registrado";
        }

        $this->user->name    = $dataFill['name'];
        $this->user->email   = $dataFill['email'];
        if(strlen($dataFill['password']) > 0)
            $this->user->password =  Hash::make($dataFill['password']);

        $this->user->save();
        $this->user->syncRoles([$data['role']]);

        if(strlen($dataFill['password']) > 0) {
            $this->emit('confirmarAcuse', [
                'icon'    => 'question',
                'title'   => 'Descargar acuse',
                'text'    => '',
                'confirmText' => 'Si',
                'method'   => 'generarAcuse',
                'callback' => 'confirmar',
                'callback_props' => ['success',$mensaje]
            ]);
        } else {
            $this->confirmar('success', $mensaje);
        }
    }

    private function resetear() {

        $this->resetExcept(['roles','partidos']);
    }
    public function confirmar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);
        $this->emit('modal:hide', '#modal-user');
        $this->emitUp('recargar');
    }

    public function generarAcuse() {
        $content = Pdf::loadView('usuarios.acuse', ['name'=> $this->name,'email' => $this->email, 'pass' => $this->password])->output();
        return response()->streamDownload(fn() => print($content), 'acuse-'.time().'.pdf');
    }

}
