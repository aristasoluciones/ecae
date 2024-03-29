<?php

namespace App\Http\Livewire\Roles;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Spatie\Permission\Models\Role;

class Lista extends DataTableComponent
{
    protected $model =  Role::class;

    protected $listeners = ['recargar'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects(['id']);
        $this->setConfigurableAreas([
            'before-tools' => [
                'roles.boton-agregar'
            ]
        ]);
    }

    public function columns(): array
    {

        return [
            Column::make('Nombre', 'name')->sortable(),
            Column::make('')
                ->label(function($row) {
                    return view('roles.acciones')->with(['row' => $row]);
                })
        ];
    }

    public function customView(): string
    {
        return 'roles.modal';
    }

    public function recargar() {
        $this->render();
    }
}
