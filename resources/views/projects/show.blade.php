<x-app-layout>
    <h1 class="text-xl text-blue-900 font-bold">{{ $project->name }}</h1>
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
        <x-link :route="route('projects.edit',$project)">
            {!! __('update this project') !!}
        </x-link>
    </div>
    <form action="{{ route('projects.destroy',$project) }}"
          method="post">
        @csrf
        @method('DELETE')
        <x-form-submission-button class="bg-red-700"
                                  icon="remove">
            {!! __('delete this project') !!}
        </x-form-submission-button>
    </form>
</x-app-layout>
