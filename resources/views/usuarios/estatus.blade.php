<div class="custom-control custom-switch checkbox-1x">
    <input type="checkbox" title=" {{ $row->activo ? 'Desactivar' : 'Activar' }}"
           id="estatus-user-{{$row->id}}"
           @if($row->activo) checked @endif
           wire:click.prevent="handlerEstatus({{ $row->id }})"
           class="custom-control-input custom-control-input-success checkbox-3x">
    <label class="custom-control-label" for="estatus-user-{{$row->id}}"></label>
</div>
