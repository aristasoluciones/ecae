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
@push('css')
<style>
    #container {
        height: 400px;
        min-width: 320px;
        max-width: 600px;
        margin: 0 auto;
    }
</style>
@endpush
