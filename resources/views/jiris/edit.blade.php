<x-app-layout>
    <h1 class="font-bold text-2xl first-letter:capitalize">{!! __('create a new jiri')  !!}</h1>
    <form action="{{ route('jiris.update',$jiri) }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">

        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold first-letter:capitalize">{!! __('name') !!}
                <span class="block font-normal">{!! __('min 3 chars, max 255') !!}</span>
                @error('name')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <input id="name"
                   type="text"
                   value="{{ old('name',$jiri) }}"
                   name="name"
                   placeholder="{!! __('jiri name') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        @php($now = now()->format('Y-m-d H:i'))
        <div class="flex flex-col gap-2">
            <label for="starting_at"
                   class="font-bold first-letter:capitalize">{!! __('starting at') !!}
                <span class="block font-normal">{!! __('formated like') !!} {{ $now }}</span>
                @error('starting_at')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <input id="starting_at"
                   type="text"
                   value="{{ old('starting_at', $jiri->starting_at->format('Y-m-d H:i')) }}"
                   name="starting_at"
                   placeholder="{{ $now }}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-submission-button class="bg-blue-500">{!! __('update this jiri') !!}</x-form-submission-button>
    </form>
</x-app-layout>
