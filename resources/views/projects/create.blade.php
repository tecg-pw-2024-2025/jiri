<x-app-layout>
    <h1 class="font-bold text-2xl first-letter:capitalize">{!! __('create a new project') !!}</h1>
    <form action="{{ route('projects.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
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
                   value="{{ old('name') }}"
                   name="name"
                   placeholder="{!! __('project name') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <div class="flex flex-col gap-2">
            <label for="description"
                   class="font-bold first-letter:capitalize">{!! __('description') !!}
                <span class="block font-normal">{!! __('in order to understand the objectives of this project')  !!}</span>
                @error('description')
                <span class="block text-red-500">{!! $message !!}</span>
                @enderror
            </label>
            <textarea id="description"
                   name="description"
                   placeholder="{!! __('comprehensive description of the project') !!}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                      class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">{{ old('description') }}</textarea>
        </div>
        <x-form-submission-button class="bg-blue-500">{!! __('create this project') !!}</x-form-submission-button>
    </form>
</x-app-layout>
