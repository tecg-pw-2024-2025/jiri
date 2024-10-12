<x-app-layout>
    <h1 class="text-3xl font-bold">{{ $project->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('name of the project') !!}</dt>
            <dd>{{ $project->name }}</dd>
        </div>
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('description of the project') !!}</dt>
            <dd>{{ $project->description }}</dd>
        </div>

    </dl>
    <div>
        <a href="{{ route('projects.edit',$project) }}"
           class="underline text-blue-500 inline-block first-letter:capitalize">{!! __('update this project') !!}</a>
    </div>
    <form action="{{ route('projects.destroy',$project) }}"
          method="post">
        @csrf
        @method('DELETE')
        <x-form-submission-button class="bg-red-500" icon="icons.remove">
            {!! __('delete this project') !!}
        </x-form-submission-button>
    </form>
</x-app-layout>
