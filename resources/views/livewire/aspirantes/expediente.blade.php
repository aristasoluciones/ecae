<div class="card" id="expediente-aspirante">
    <div class="card-header">
        <div class="btn-group-toggle text-right">
            <a href="javascript:;" class="btn btn-primary"
               data-toggle="tooltip"
               title="Imprimir acuse de documentación" wire:click="generarAcuse"><span wire:loading wire:target="generarAcuse">Generando documento...</span><span wire:loading.remove wire:target="generarAcuse"><i class="fas fa-file-pdf"></i></span></a>
        </div>
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
        <div class="row mt-3">
            <div class="col-md-12 dropdown-divider pb-3"></div>
            <div class="col-md-6 col-sm-12">
                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <button type="button" class="btn btn-primary btn-file">
                            <span>Adjuntar evidencia de la documentación cotejada</span>
                        <input wire:model='documentacion' accept="application/pdf" type="file" name="documentacion">
                        </button>
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                <small class="text-muted text-justify d-block">(Archivo en formato PDF, con tamaño máximo de 7MB)</small>
                @error('documentacion')
                    <span class="text-danger error h6">{{ $message }}</span>
                @enderror
            </div>
            @if($documentacionBase64 != null)
                <div class="col-md-3 col-sm-12">
                    <button
                        type="button"
                        class="btn btn-warning"
                        wire:click="descargarEvidencia">
                        Descargar evidencia
                    </button>
                </div>
                <div class="col-md-3 col-sm-12">
                    <button
                        type="button"
                        class="btn btn-danger"
                        wire:click="handlerEliminar">
                        Eliminar evidencia
                    </button>
                </div>
                <div class="col-sm-12 mt-2">
                    <iframe style="width:100%; height: 100vh" src="data:application/pdf;base64, {{ $documentacionBase64 }}"
                           type="application/pdf"
                            allowfullscreen></iframe>
                </div>
            @endif
        </div>

    </div>
    <div id="modal-confirmar-evidencia" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <h4 class="modal-title">Confirmar y guardar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-justify">
                            <p>¿Esta seguro de subir la información?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group-toggle" wire:loading.remove wire.target="guardarEvidencia">
                        <button type="button"
                                class="btn btn-danger close-btn mr-2"
                                data-dismiss="modal">Cancelar
                        </button>
                        <button type="button"
                                class="btn btn-primary"
                                wire:click="guardarEvidencia">Si
                        </button>
                    </div>
                    <button type="button"
                            class="btn btn-primary"
                            wire:loading wire.target="guardarEvidencia">
                        <span>Procesando información <i class="fas fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-confirmar-eliminar-evidencia" wire:ignore.self class="modal fade" role="dialog" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Confirmar y eliminar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-justify">
                            <p>¿Esta seguro de eliminar la evidencia actual?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group-toggle" wire:loading.remove wire.target="eliminarEvidencia">
                        <button type="button"
                                class="btn btn-danger close-btn mr-2"
                                data-dismiss="modal">Cancelar
                        </button>
                        <button type="button"
                                class="btn btn-primary"
                                wire:click="eliminarEvidencia">Si
                        </button>
                    </div>
                    <button type="button"
                            class="btn btn-primary"
                            wire:loading wire.target="eliminarEvidencia">
                        <span>Procesando información <i class="fas fa-spinner"></i></span>
                    </button>
                </div>
            </div>
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
