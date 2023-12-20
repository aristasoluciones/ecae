<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class Lista extends DataTableComponent
{
    protected $model =  User::class;

    public User $user;

    protected $listeners = ['recargar'];
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects(['id','sede','email_verified_at']);
        $this->setColumnSelectEnabled();
        $this->setConfigurableAreas([
            'before-tools' => [
                'usuarios.boton-agregar'
            ]
        ]);
    }

    public function filtrar($query): Builder
    {
        if (!auth()->user()->hasRole('superadministrador')) {
             $query->whereHas('roles', fn ($query2) => $query2->where('name', '!=', 'superadministrador'));
        }
        return $query;
    }

    public function getRows()
    {
        $query = $this->baseQuery();
        $this->builder = $this->filtrar($query);
        return $this->executeQuery();
    }

    public function columns(): array
    {

        return [
            Column::make('Nombre', 'name')->sortable(),
            Column::make('Nombre de usuario o Correo electrónico','email'),
            Column::make('Tipo de usuario')->label(fn ($row) => view('usuarios.tipo')->with(['row' => $row])),
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

       $this->user->email_verified_at = $this->user->email_verified_at ? null : date('Y-m-d H:i:s');
       $this->user->save();
       $this->emit('swal:alert', [
            'icon'    => 'success',
            'title'   => 'Usuario desactivado',
            'timeout' => 5000
        ]);
        $this->emit('modal:hide', '#modal-estatus');;

       $this->render();
    }

    public function recargar() {
        $this->render();
    }
}
