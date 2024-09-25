<x-layouts.main>
    <h1 class="font-bold text-2xl first-letter:capitalize">{!! __('create a new contact') !!}</h1>
    <form action="{{ route('contacts.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="first_name"
                   class="font-bold first-letter:capitalize">{!! __('first name') !!}
                <span class="block font-normal">{!! __('min 3 chars, max 255') !!}</span>
                @error('first_name')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <input id="first_name"
                   type="text"
                   value="{{ old('first_name') }}"
                   name="first_name"
                   placeholder="{!! __('jon') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <div class="flex flex-col gap-2">
            <label for="last_name"
                   class="font-bold first-letter:capitalize">{!! __('last name') !!}
                <span class="block font-normal">{!! __('min 3 chars, max 255') !!}</span>
                @error('last_name')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <input id="last_name"
                   type="text"
                   value="{{ old('last_name') }}"
                   name="last_name"
                   placeholder="{!! __('doe') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email"
                   class="font-bold first-letter:capitalize">{!! __('email of the contact') !!}
                @error('email')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <input id="email"
                   type="text"
                   value="{{ old('email') }}"
                   name="email"
                   placeholder="{!! __('jon@doe.com') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button class="bg-blue-500">{!! __('create this contact') !!}</x-form-submission-button>
    </form>
</x-layouts.main>
