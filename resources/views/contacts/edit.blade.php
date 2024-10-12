<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize text-blue-900">{!! __('create a new contact')  !!}</h1>
    <form action="{{ route('contacts.update',$contact) }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">

        @csrf
        @method('PATCH')

        <x-input-with-label id="first_name"
                            name="first_name"
                            label-text="{!! __('first name') !!}"
                            :value="old('first_name',$contact)"
                            help-text="min 3 chars, max 255"
                            autofocus
                            placeholder="jon" />

        <x-input-with-label id="last_name"
                            name="last_name"
                            label-text="{!! __('last name') !!}"
                            :value="old('last_name',$contact)"
                            help-text="min 3 chars, max 255"
                            placeholder="doe" />

        <x-input-with-label id="email"
                            name="email"
                            label-text="{!! __('email of the contact') !!}"
                            :value="old('email',$contact)"
                            placeholder="jon@doe.com"
                            required />

        <div>
            <x-form-submission-button class="bg-blue-700" icon="update">
                {!! __('update this contact') !!}
            </x-form-submission-button>
        </div>
    </form>
</x-app-layout>
