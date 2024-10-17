<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize">{!! __('create a new contact') !!}</h1>
    <form action="{{ route('contacts.store') }}"
          method="post"
          enctype="multipart/form-data"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <x-input-with-label id="first_name"
                            name="first_name"
                            label-text="first name"
                            help-text="min 3 chars, max 255"
                            placeholder="jon"
                            autofocus
                            :value="old('first_name')"/>
        <x-input-with-label id="last_name"
                            name="last_name"
                            label-text="last name"
                            help-text="min 3 chars, max 255"
                            placeholder="doe"
                            :value="old('last_name')"/>
        <x-input-with-label id="email"
                            name="email"
                            label-text="email of the contact"
                            placeholder="jon@doe.com"
                            required
                            :value="old('email')"/>
        <x-input-with-label id="photo"
                            name="photo"
                            label-text="photo of the contact"
                            help-text="images of max 2Mb and max 2000X2000 pixels"
                            type="file"
                            accept="image/*"
                            :value="old('photo')"/>
        <div>
            <x-form-submission-button class="bg-blue-700">
                {!! __('create this contact') !!}
            </x-form-submission-button>
        </div>
    </form>
</x-app-layout>
