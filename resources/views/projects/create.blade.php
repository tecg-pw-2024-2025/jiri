<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize">{!! __('create a new project') !!}</h1>
    <x-jiri-form action="{{ route('projects.store') }}"
                 method="post"
                 class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <x-input-with-label id="name"
                            name="name"
                            label-text="name"
                            help-text="min 3 chars, max 255"
                            placeholder="project name"
                            :value="old('name')"
                            autofocus
                            required
        />
        <x-input-with-label id="description"
                            type="textarea"
                            name="description"
                            label-text="description"
                            help-text="in order to understand the objectives of this project"
                            placeholder="comprehensive description of the project"
                            :value="old('description')"
        />
        <div>
            <x-form-submission-button class="bg-blue-700"
                                      icon="add">
                {!! __('create this project') !!}
            </x-form-submission-button>
        </div>
    </x-jiri-form>
</x-app-layout>
