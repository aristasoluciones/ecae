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
                        <a key="list-{{ $key }}" type="button"
                           @hasanyrole("superadministrador|administrador|consejero")
                            wire:click.prevent="seleccionarMunicipio('{{ $mun }}')"
                           @endhasanyrole
                           class="list-group-item d-flex justify-content-between aligns-items-center list-group-item-action {{ $mun === $this->municipioSeleccionado ? 'active' : '' }}"
                           wire:loading.class="disabled" wire:target="seleccionarMunicipio"
                        >{{ $mun }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-10">
                <div class="container" wire:loading.inline wire:target="seleccionarMunicipio">
                    <div class="row align-items-center h-100">
                        <div class="col-12 text-center">
                            <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status">
                                <span class="sr-only">Cargando...</span>
                            </div>
                            <p class="text-info">Cargando informaçión ....</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 wire:loading.remove wire:target="seleccionarMunicipio"  class="text-dark text-bold text-center">{{ $this->tituloReporte }}</h2>
                    </div>
                    <div class="col-12 dropdown-divider"></div>
                </div>
                @if(auth()->user()->can('aspirantes.proyecciones'))
                <div class="row" wire:loading.remove wire:target="seleccionarMunicipio">
                    <div class="col-md-4 col-sm-12 ">
                        <livewire:aspirantes.proyeccion
                            wire:key="proyeccion-gen-{{ time() }}"
                            theme="gradient-gray-dark"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-4 col-sm-12 bg-gr">
                        <livewire:aspirantes.proyeccion
                            wire:key="proyeccion-sel-{{ time() }}"
                            figura="SEL"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <livewire:aspirantes.proyeccion
                            wire:key="proyeccion-cael-{{ time() }}"
                            figura="CAEL"
                            municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                </div>
                @endif

                <div class="row" wire:loading.remove wire:target="seleccionarMunicipio">
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="secondary"
                                                     :wire:key="'todo-'.time()"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="success"
                                                     :wire:key="'aceptado-'.time()"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_ACEPTADO }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="warning"
                                                     :wire:key="'pendiente-'.time()"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_PENDIENTE }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="danger"
                                                     :wire:key="'no-aceptado-'.time()"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_NO_ACEPTADO }}"
                                                     municipio="{{ $municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="indigo"
                                                     :wire:key="'evaluado-'.time()"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_EVALUADO }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <livewire:aspirantes.resumen theme="pink"
                                                     :wire:key="'entrevistado-'.time()"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_ENTREVISTADO }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                </div>

                <div class="row" wire:loading.remove wire:target="seleccionarMunicipio">
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
