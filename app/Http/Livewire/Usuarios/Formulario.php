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
    public $sede;

    public $roles;
    public $consejos;

    public $viewPassword = false;
    public $fromCandidato;

    protected $listeners = ['agregar','editar', 'crearUsuarioCandidato'];

    public $messages = [
        'name.required'  => 'El campo Nombre es requerido',
        'email.required' => 'El campo Nombre de usuario o Correo electrónico es requerido',
        'role.required'  => 'El campo Rol es requerido',
        'sede.required'  => 'El campo Consejo electoral es requerido',
        'password.required'  => 'El campo Contraseña es requerido',
        'password.confirmed'  => 'La contraseña no coincide con la confirmación',
        'password_confirmation.required'  => 'El campo Confirmar contraseña es requerido',
    ];

    protected function rules() {

        return [
            'email'            => ['required', Rule::unique('users')->ignore($this->user?->id)],
            'name'             => 'required|string',
            'role'             => 'required|string',
            'sede'             => 'required_if:role,=,odes',
            'password'         => $this->validarPassword().'|confirmed',
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
        $municipios = config('constants.municipios');

        $this->consejos = array_map(fn($var) => 'Consejo Municipal Electoral de ' .$var, $municipios);

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
        $this->sede    =  $this->user->sede;
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
        $this->user->sede    = $dataFill['sede'] ?? null;
        if(strlen($dataFill['password']) > 0)
            $this->user->password =  Hash::make($dataFill['password']);

        $this->user->save();
        $this->user->syncRoles([$data['role']]);
        $this->confirmar('success', $mensaje);
    }

    private function resetear() {

        $this->resetExcept(['roles','consejos']);
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
}
