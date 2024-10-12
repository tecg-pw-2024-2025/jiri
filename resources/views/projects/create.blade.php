<x-app-layout>
    <h1 class="font-bold text-2xl first-letter:capitalize">{!! __('create a new project') !!}</h1>
    <form action="{{ route('projects.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <x-input-with-label id="name"
                            name="name"
                            label-text="name"
                            help-text="min 3 chars, max 255"
                            placeholder="project name"
                            :value="old('name')"/>
        <x-input-with-label id="description"
                            type="textarea"
                            name="description"
                            label-text="description"
                            help-text="in order to understand the objectives of this project"
                            placeholder="comprehensive description of the project"
                            :value="old('description')"/>
        <x-form-submission-button class="bg-blue-500">{!! __('create this project') !!}</x-form-submission-button>
    </form>
</x-app-layout>
