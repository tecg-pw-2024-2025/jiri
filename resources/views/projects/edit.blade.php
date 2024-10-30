<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize">{!! __('create a new project')  !!}</h1>
    <x-jiri-form action="{{ route('projects.update',$project) }}"
                 method="post"
                 class="flex flex-col gap-8 bg-slate-50 p-4">

        @csrf
        @method('PATCH')

        <x-input-with-label id="name"
                            name="name"
                            label-text="{!! __('name') !!}"
                            help-text="{!! __('min 3 chars, max 255') !!}"
                            placeholder="{!! __('project name') !!}"
                            autofocus
                            required
                            :value="old('name',$project)"
        />

        <x-input-with-label id="description"
                            name="description"
                            type="textarea"
                            label-text="{!! __('description') !!}"
                            help-text="{!! __('in order to understand the objectives of this project')  !!}"
                            placeholder="{!! __('comprehensive description of the project') !!}"
                            :value="old('description',$project)"
        />

        <div>
            <x-form-submission-button class="bg-blue-700"
                                      icon="update">
                {!! __('update this project') !!}
            </x-form-submission-button>
        </div>
    </x-jiri-form>
</x-app-layout>
