<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Spatie\Permission\Models\Role;

class Lista extends DataTableComponent
{
    use WithPagination;

    protected $model =  User::class;
    public User $user;
    public $roles;
    public $consejos;
    public $fTipoUsuario;
    public $fNombre;
    public $fConsejo;

    protected $listeners = ['recargar'];

    public function updatedfTipoUsuario() {
        $this->resetPage();
    }
    public function updatedfPartido() {
        $this->resetPage();
    }
    public function updatedfNombre() {
        $this->resetPage();
    }
    public function getTipoUserProperty() {
        return $this->fTipoUsuario;
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects(['id','sede','email_verified_at','activo']);
        $this->setColumnSelectDisabled();
        $this->setSearchDisabled();
        $this->setConfigurableAreas([
            'before-tools' => [
                'usuarios.tools'
            ]
        ]);
    }
    public function mount() {

        $this->reset(['fNombre','fTipoUsuario','fConsejo']);
        $this->roles = Role::query()->whereNotIn('name', config('constants.roles_especiales'))
            ->orderBy('name')
            ->get()
            ->keyBy('name')
            ->map(fn($rol) => ucfirst(implode(' ', explode('_', $rol['name']))))
            ->toArray();

        $municipios = config('constants.municipios');

        $this->consejos = array_map(fn($var) => 'Consejo Municipal Electoral de ' .$var, $municipios);
    }


    public function filtrar($query): Builder
    {
        if($this->fTipoUsuario)
            $query->whereHas('roles', fn($query2) => $query2->where('name', $this->fTipoUsuario));

        if($this->fNombre)
            $query->whereRaw('name LIKE ?', ['%'.$this->fNombre.'%']);

        if($this->fConsejo)
            $query->whereRaw('sede LIKE ?', ['%'.$this->fConsejo.'%']);

        $query->whereDoesntHave('roles', fn ($query2) => $query2->where('name',config('constants.roles_especiales')));

        return $query;
    }

    public function getRows()
    {
        $query = $this->baseQuery();
        $this->builder = $this->filtrar($query);
        return $this->executeQuery();
    }

    public function buscar()
    {
        $this->resetPage();
        $this->getRows();
    }

    public function columns(): array
    {

        return [
            Column::make('Nombre', 'name')->sortable()->searchable(),
            Column::make('Nombre de usuario o Correo electrónico','email'),
            Column::make('Tipo de usuario')->label(fn ($row) => view('usuarios.tipo')->with(['row' => $row]))->searchable(),
            Column::make('Estatus')
                ->label(function($row) {
                    return view('usuarios.estatus')->with(['row' => $row]);
                }),
            Column::make('')
                ->label(function($row) {
                    return view('usuarios.acciones')->with(['row' => $row]);
                })
        ];
    }

    public function customView(): string
    {
        return 'usuarios.modal';
    }

    public function handlerEstatus($id) {

        $this->user = User::find($id);
        $this->emit('modal:show', '#modal-estatus');
    }

    public function toggleEstatus() {

        $msj =  $this->user->activo ? 'El usuario ha sido inactivado' : 'El usuario ha sido activado';
        $this->user->activo = $this->user->activo ? 0 : 1;
        $this->user->save();
        $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => $msj,
            'timeout' => 5000
        ]);
        $this->emit('modal:hide', '#modal-estatus');;

        $this->render();
    }

    public function recargar() {
        $this->render();
    }
}
