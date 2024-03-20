<div wire:ignore key="{{ $chart?->id }}">
    @if($chart)
        {!! $chart->container() !!}
    @endif
</div>

@if($chart)
    @push('js')
        {!! $chart->script() !!}
    @endpush
@endif

