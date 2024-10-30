<x-app-layout>
    <x-index-title-with-add-link :route="route('projects.create')">
        <x-slot:title>{!! __('my projects') !!}</x-slot:title>
        <x-slot:link>{!! __('create a new project') !!}</x-slot:link>
    </x-index-title-with-add-link>
    @if($projects)
        <x-projects.list :projects="$projects"/>
    @endif
</x-app-layout>
