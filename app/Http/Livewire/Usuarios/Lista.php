<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Validation\Rule;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class Lista extends DataTableComponent
{
    protected $model =  User::class;

    protected $listeners = ['recargar'];
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectEnabled();
        $this->setConfigurableAreas([
            'before-tools' => [
                'usuarios.boton-agregar'
            ]
        ]);
    }

    public function columns(): array
    {

        return [
            Column::make('Nombre', 'name')->sortable(),
            Column::make('Email','email'),
            ComponentColumn::make('acciones', 'id')
                ->component('acciones-usuario')
                ->attributes(fn($value) => ['id' => $value]),
        ];
    }

    public function customView(): string
    {
        return 'usuarios.modal';
    }

    public function recargar() {
        $this->render();
    }
}
