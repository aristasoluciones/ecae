<div wire:poll.10s>
    <div wire:ignore wire:key={{ $chart_id }}>
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
