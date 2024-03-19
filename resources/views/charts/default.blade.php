
<div>
    <div wire:key="search-{{ $chart_id }}" wire:ignore class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="">Seleccione un municipio</label>
                    <select class="form-control"
                            wire:model = "municipio">
                        <option value="">
                            {{ __('adminlte::adminlte.please_select') }}
                        </option>
                        @foreach ($this->municipios as $municipio)
                            <option value="{{ $municipio }}">{{ $municipio }}
                            </option>
                        @endforeach

                        ></select>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore wire:key="{{ $chart_id }}">
        @if($chart)
            {!! $chart->container() !!}
        @endif
    </div>
</div>

@if($chart)
    @push('js')
        @if(count($chart->datasets) > 0)
            {!! $chart->script() !!}
        @endif
    @endpush
@endif
