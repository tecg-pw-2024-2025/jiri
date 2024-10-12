<x-app-layout>
    <h1 class="text-3xl font-bold first-letter:capitalize">{!! __('my projects') !!}</h1>
    @if($projects)
        <x-projects.list :projects="$projects" />
    @endif

    <div class="flex justify-end">
        <a href="{{ route('projects.create') }}"
           class="underline text-blue-500 flex items-center gap-2">
            <x-icons.add />
            <span>{{ __('create a new project') }}</span></a>
    </div>
</x-app-layout>
