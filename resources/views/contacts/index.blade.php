<x-app-layout>
    <h1 class="text-3xl font-bold first-letter:capitalize">{!! __('my contacts') !!}</h1>
    @if($contacts)
        <x-contacts.list :contacts="$contacts" />
    @else
        <p>{!! __('there is no contact yet') !!}</p>
    @endif

    <div class="flex justify-end">
        <a href="{{ route('contacts.create') }}"
           class="underline text-blue-500 flex items-center gap-2">
            <x-icons.add />
            <span>{{ __('create a new contact') }}</span></a>
    </div>
</x-app-layout>
