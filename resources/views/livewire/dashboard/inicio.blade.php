<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 vh-100" style="overflow: scroll">
                <div class="list-group">
                    @hasanyrole('superadministrador|administrador|consejero')
                    <a wire:key="principal-list" wire:click.prevent="seleccionarMunicipio(null)"
                       type="button"
                       class="list-group-item d-flex justify-content-between aligns-items-center list-group-item-action {{ !$this->municipioSeleccionado ? 'active' : '' }}">Estado</a>
                    @endhasanyrole
                    @foreach($this->municipios as $key => $mun)
                        <a wire:key="list-{{ $key }}" type="button" @hasanyrole('superadministrador|administrador|consejero') wire:click.prevent="seleccionarMunicipio('{{ $mun }}')" @endhasanyrole
                           class="list-group-item d-flex justify-content-between aligns-items-center list-group-item-action {{ $mun === $this->municipioSeleccionado ? 'active' : '' }}">{{ $mun }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-dark text-bold text-center">{{ $this->tituloReporte }}</h2>
                    </div>
                    <div class="col-12 dropdown-divider"></div>
                </div>

                @if(auth()->user()->can('aspirantes.proyecciones'))
                <div class="row">
                    <div class="col-md-4 col-sm-12 ">
                        <livewire:aspirantes.proyeccion
                            key="proyeccion-gen-{{ now() }}"
                            theme="gradient-gray-dark"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-4 col-sm-12 bg-gr">
                        <livewire:aspirantes.proyeccion
                            key="proyeccion-sel-{{ now() }}"
                            figura="SEL"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <livewire:aspirantes.proyeccion
                            key="proyeccion-cael-{{ now() }}"
                            figura="CAEL"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="secondary"
                                                     key="todo-{{ now() }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="success"
                                                     key="aceptado-{{ now() }}"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_ACEPTADO }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="warning"
                                                     key="pendiente-{{ now() }}"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_PENDIENTE }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="danger"
                                                     key="no-aceptado-{{ now() }}"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_NO_ACEPTADO }}"
                                                     municipio="{{ $municipioSeleccionado }}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="overlay-wrapper">
                            @livewire('charts.genero')
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="overlay-wrapper">
                            @livewire('charts.edad')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
