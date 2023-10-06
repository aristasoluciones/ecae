<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-end">
                    @foreach($this->btnCandidaturas as $ke => $btnCandidatura)
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <button type="button" :wire:key="llabe-{{$ke}}"
                                    class="btn btn-{{ $this->currentTipo === $btnCandidatura['tipo_candidatura'] ? 'success' : 'secondary' }} btn-block m-1"
                                    wire:click.prevent="filtrar('{{$btnCandidatura['tipo_candidatura']}}')">{{ $btnCandidatura['tipo_candidatura'] }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                @if(count($this->btnCandidaturas) >0)
                    @livewire('aspirantes.lista', ['tipoCandidatura' => $btnCandidaturas[0]['tipo_candidatura']], key('{{ time() }}'))
                @else
                    @livewire('aspirantes.lista')
                @endif
            </div>
        </div>
    </div>
</div>
