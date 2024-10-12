<x-app-layout>
    <h1 class="text-xl text-blue-900 font-bold first-letter:capitalize">{!! __('my contacts') !!}</h1>
    @if($contacts)
        <x-contacts.list :contacts="$contacts" />
    @else
        <p>{!! __('there is no contact yet') !!}</p>
    @endif

    <div class="flex justify-end">
        <x-link :route="route('contacts.create')"
                icon="add"
                icon-position="before">
            <span>{{ __('create a new contact') }}</span>
        </x-link>
    </div>
</x-app-layout>
