<div class="card" id="expediente-aspirante">
    <div class="card-header">
        <div class="btn-group-toggle text-right">
            <a href="javascript:;" class="btn btn-primary"
               data-toggle="tooltip"
               title="Imprimir acuse de documentación" wire:click="generarAcuse"><span wire:loading wire:target="generarAcuse">Generando documento...</span><span wire:loading.remove wire:target="generarAcuse"><i class="fas fa-file-pdf"></i></span></a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Documento</th>
                <th>Mostro original</th>
                <th>Entrego copia</th>
                </thead>
                <tbody>

                @foreach($expedientes as $key => $expediente)
                    <tr>
                        <td>{{ $expediente->documento->nombre }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox"
                                       id="mostro-original-{{$key}}"
                                       @if($expediente->mostro_original) checked @endif
                                       wire:click="validar({{ $expediente->id }},'original')"
                                       class="custom-control-input custom-control-input-success checkbox-3x">
                                <label class="custom-control-label" for="mostro-original-{{$key}}"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox"
                                       id="entrego-copia-{{$key}}"
                                       @if($expediente->entrego_copia) checked @endif
                                       wire:click="validar({{ $expediente->id }},'copia')"
                                       class="custom-control-input custom-control-input-success checkbox-3x">
                                <label class="custom-control-label" for="entrego-copia-{{$key}}"></label>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            $("body").tooltip({ selector: '[data-toggle=tooltip]' });
        })
    </script>
@endsection
