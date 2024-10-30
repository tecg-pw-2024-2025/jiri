<x-app-layout>
    <x-index-title-with-add-link :route="route('contacts.create')">
        <x-slot:title>{!! __('my contacts') !!}</x-slot:title>
        <x-slot:link>{!! __('create a new contact') !!}</x-slot:link>
    </x-index-title-with-add-link>
    @if($contacts)
        <x-contacts.list :contacts="$contacts"/>
    @else
        <p>{!! __('there is no contact yet') !!}</p>
    @endif
</x-app-layout>
