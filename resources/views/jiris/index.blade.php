<x-app-layout>
    <h1 class="text-xl text-blue-900 font-bold first-letter:capitalize text-blue-900">{!! __('my jiris') !!}</h1>
    @if($pastJiris)
        <h2 class="font-bold first-letter:capitalize">{!! __('past jiris') !!}</h2>
        <x-jiris.list :jiris="$pastJiris" />
    @endif

    @if($upcomingJiris)
        <h2 class="font-bold first-letter:capitalize">{!! __('upcoming jiris') !!}</h2>
        <x-jiris.list :jiris="$upcomingJiris" />
    @endif

    <div class="flex justify-end">
        <x-link :route="route('jiris.create')"
                icon="add"
                icon-position="before">
            <span>{{ __('create a new jiri') }}</span>
        </x-link>
    </div>
</x-app-layout>
