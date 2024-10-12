<x-app-layout>
    <h1 class="text-3xl font-bold">{{ $contact->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('name of the contact') !!}</dt>
            <dd>{{ $contact->full_name }}</dd>
        </div>
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('email of the contact') !!}</dt>
            <dd>{{ $contact->email }}</dd>
        </div>
    </dl>
    <div>
        <a href="{{ route('contacts.edit',$contact) }}"
           class="underline text-blue-500 inline-block first-letter:capitalize">{!! __('update this contact') !!}</a>
    </div>
    <form action="{{ route('contacts.destroy',$contact) }}"
          method="post">
        @csrf
        @method('DELETE')
        <x-form-submission-button class="bg-red-500" icon="icons.remove">
            {!! __('delete this contact') !!}
        </x-form-submission-button>
    </form>
</x-app-layout>
