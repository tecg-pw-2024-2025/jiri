<x-app-layout>
    <h1 class="text-3xl font-bold first-letter:capitalize">{!! __('my jiris') !!}</h1>
    @if($pastJiris)
        <h2 class="font-bold first-letter:capitalize">{!! __('past jiris') !!}</h2>
        <x-jiris.list :jiris="$pastJiris" />
    @endif

    @if($upcomingJiris)
        <h2 class="font-bold first-letter:capitalize">{!! __('upcoming jiris') !!}</h2>
        <x-jiris.list :jiris="$upcomingJiris" />
    @endif

    <div class="flex justify-end">
        <a href="{{ route('jiris.create') }}"
           class="underline text-blue-500 flex items-center gap-2">
            <x-icons.add />
            <span>{{ __('create a new jiri') }}</span></a>
    </div>
</x-app-layout>
