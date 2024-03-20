<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 vh-100" style="overflow: scroll">
                <div class="list-group">
                    @hasanyrole('superadministrador|administrador]')
                    <a wire:key="principal-list" wire:click="seleccionarMunicipio(null)"
                       class="list-group-item d-flex justify-content-between aligns-items-center list-group-item-action {{ !$this->municipioSeleccionado ? 'active' : '' }}">Estado</a>
                    @endhasanyrole
                    @foreach($this->municipios as $key => $mun)
                        <a wire:key="list-{{ $key }}" @hasanyrole('superadministrador|administrador]')wire:click="seleccionarMunicipio('{{ $mun }}') @endhasanyrole"
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

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <livewire:aspirantes.resumen theme="success"
                                                     key="{{ now() }}"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_ACEPTADO }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <livewire:aspirantes.resumen theme="warning"
                                                     key="{{ now() }}"
                                                     estatus="{{ \App\Models\Aspirante::ESTATUS_PENDIENTE }}"
                                                     municipio="{{ $this->municipioSeleccionado }}"/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <livewire:aspirantes.resumen theme="danger"
                                                     key="{{ now() }}"
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
