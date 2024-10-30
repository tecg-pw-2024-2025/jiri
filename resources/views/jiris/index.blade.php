<x-app-layout>
    <x-index-title-with-add-link :route="route('jiris.create')">
        <x-slot:title>{!! __('my jiris') !!}</x-slot:title>
        <x-slot:link>{!! __('create a new jiri') !!}</x-slot:link>
    </x-index-title-with-add-link>
    @if($upcomingJiris)
        <section>
            <h2 class="font-bold first-letter:capitalize">{!! __('upcoming jiris') !!}</h2>
            <x-jiris.list :jiris="$upcomingJiris"/>
        </section>
    @endif

    @if($pastJiris)
        <section>
            <h2 class="font-bold first-letter:capitalize">{!! __('past jiris') !!}</h2>
            <x-jiris.list :jiris="$pastJiris"/>
        </section>
    @endif
</x-app-layout>
