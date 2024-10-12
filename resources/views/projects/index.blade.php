<x-app-layout>
    <h1 class="text-xl text-blue-900 font-bold first-letter:capitalize">{!! __('my projects') !!}</h1>
    @if($projects)
        <x-projects.list :projects="$projects" />
    @endif

    <div class="flex justify-end">
        <x-link :route="route('projects.create')"
                icon="add"
                icon-position="before">
            <span>{{ __('create a new project') }}</span>
        </x-link>
    </div>
</x-app-layout>
