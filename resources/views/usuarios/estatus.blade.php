<div class="custom-control custom-switch checkbox-1x">
    <input type="checkbox" title=" {{ !is_null($row->email_verified_at) ? 'Activar' : 'Desactivar' }}"
           id="estatus-user-{{$row->id}}"
           @if(!is_null($row->email_verified_at)) checked @endif
           wire:click.prevent="handlerEstatus({{ $row->id }})"
           class="custom-control-input custom-control-input-success checkbox-3x">
    <label class="custom-control-label" for="estatus-user-{{$row->id}}"></label>
</div>
