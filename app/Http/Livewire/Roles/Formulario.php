<?php

namespace App\Http\Livewire\Roles;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Formulario extends Component
{
    public $role;

    public $name;
    public $permisos;

    public $listaPermisos;

    protected $listeners = ['agregar','editar'];

    public $messages = [
        'name.required'     => 'El campo Nombre es requerido',
        'permisos.required' => 'Seleccione al menos un permiso',
    ];

    protected function rules() {

        return [
            'name'     => ['required', Rule::unique('roles')->ignore($this->role?->id)],
            'permisos' => 'required|array|filled'
        ];
    }

    public function updated($propertyName) {

        $this->validateOnly($propertyName);
    }

    public function mount() {
        $this->permisos = [];
    }

    public function render()
    {
        $permisos = Permission::all();
        $arrayPermisos = [];
        foreach ($permisos as $permiso) {
            $perm = explode('.', $permiso['name']);
            switch (count($perm)) {
                case 1:
                    $cad['title'] =  ucfirst($perm[0]);
                    $cad['name']  =  $perm[0];
                    $cad['fullname']  =   $permiso['name'];
                    $arrayPermisos[0][] = $cad ;
                    break;
                case 2:
                    $cad['title'] =  ucfirst($perm[1]);
                    $cad['name']  =  $perm[1];
                    $cad['fullname']  =   $permiso['name'];
                    $arrayPermisos[1][$perm[0]][] = $cad ;
                    break;
                case 3:
                    $cad['title'] =  ucfirst($perm[2]);
                    $cad['name']  =  $perm[2];
                    $cad['fullname']  =   $permiso['name'];
                    $arrayPermisos[2][$perm[1]][] = $cad;
                    break;
            }
        }

        $this->listaPermisos = $arrayPermisos;
        return view('livewire.roles.formulario');
    }

    public function agregar() {

        $this->resetear();
        $this->emit('modal:show', '#modal-rol');
    }

    public function editar($id) {

        $this->resetear();
        $this->role =  Role::find($id);
        $this->name    = $this->role->name;
        $permisosActuales = $this->role->permissions?->toArray();
        if(count($permisosActuales) > 0) {
            $this->permisos = array_column($permisosActuales, 'name');
        }


        $this->emit('modal:show', '#modal-rol');
    }

    public function guardar() {

        $data = $this->validate();
        $dataFill =  $data;
        unset($dataFill['permisos']);
        $role = Role::create($dataFill);
        $role->syncPermissions($data['permisos']);
        $this->confirmar('success', 'Registro guardado');
    }
    public function actualizar() {

        $data = $this->validate();
        $dataFill =  $data;
        unset($dataFill['permisos']);
        Role::where('id', $this->role->id)->update($dataFill);
        $this->role->syncPermissions([]);
        $this->role->syncPermissions($data['permisos']);
        $this->confirmar('success', 'Registro actualizado');
    }

    private function resetear() {

        $this->resetExcept(['listaPermisos']);
    }
    public function confirmar($type, $titulo) {

        $this->emit('swal:alert', [
            'icon'    => $type,
            'title'   => $titulo,
            'timeout' => 5000
        ]);

        $this->emit('modal:hide', '#modal-rol');
        $this->emitUp('recargar');

    }

}
