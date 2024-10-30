<x-app-layout>
    <x-index-title-with-add-link :route="route('contacts.create')">
        <x-slot:title>{!! __('my contacts') !!}</x-slot:title>
        <x-slot:link>{!! __('create a new contact') !!}</x-slot:link>
    </x-index-title-with-add-link>
    @livewire('contacts-list')
</x-app-layout>
