<div class="d-flex flex-row {{$position}} mb-2">
    <a class="btn btn-{{$theme}} {{$class}}"
            @isset($route) href="{{ route($route) }}" @endisset
            @isset($evento) wire:click="{{$evento}}" @endisset
            title="{{$title}}">
        @isset($label) {{ $label }} @endisset
        @isset($icon) <i class="{{ $icon }}"></i> @endisset
    </a>
</div>

