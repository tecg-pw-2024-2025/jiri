<x-app-layout>
    <div class="flex flex-col gap-4 mb-8">
        <h1 class="text-3xl font-bold">{{ $jiri->name }}</h1>
        <dl class="flex flex-col gap-4 bg-slate-50 p-4">
            <div>
                <dt class="font-bold first-letter:capitalize">{!! __('name of the jiri') !!}</dt>
                <dd>{{ $jiri->name }}</dd>
            </div>
            <div>
                <dt class="font-bold first-letter:capitalize">{!! __('date and time of the jiri') !!}</dt>
                <dd class="first-letter:capitalize">{{ $jiri->starting_at->diffForHumans() }}</dd>
                <dd>
                    <time datetime="{{ $jiri->starting_at }}"
                          class="inline-block first-letter:capitalize">
                        {!! __('on') !!} {{ $jiri->starting_at->format('d M Y') }} {!! __('at') !!} {{ $jiri->starting_at->format('H:i') }}</time>
                </dd>
            </div>
        </dl>
        <div>
            <a href="{{ route('jiris.edit',$jiri) }}"
               class="underline text-blue-500 inline-block first-letter:capitalize">{!! __('update this jiri') !!}</a>
        </div>
        <form action="{{ route('jiris.destroy',$jiri) }}"
              method="post">
            @csrf
            @method('DELETE')
            <x-form-submission-button class="bg-red-500">
                {!! __('delete this jiri') !!}
            </x-form-submission-button>
        </form>
    </div>
    <div class="flex flex-col gap-8">
        <!-- *************** -->
        <!-- Les évaluateurs -->
        <!-- *************** -->
        <section class="flex flex-col gap-2">
            <header>
                <h2 class="text-2xl font-bold first-letter:capitalize">{!! __('list of the evaluators') !!}</h2>
                <p class="first-letter:capitalize">{!! __('sorted by family name') !!}</p>
            </header>

            <ul class="flex flex-col gap-4">
                @foreach($jiri->evaluators as $evaluator)
                    <li class="flex items-center gap-2">
                        <a href=""
                           class="underline text-blue-500 inline-block first-letter:capitalize">{{ $evaluator->full_name }}</a>
                        <form action="{{route('attendances.update',$evaluator->pivot->id)}}"
                              method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden"
                                   name="role"
                                   value="{{ \App\Enums\ContactRoles::Student->value }}">
                            <x-form-submission-button class="bg-green-500">
                                {!! __('change role to student') !!}
                            </x-form-submission-button>
                        </form>
                        <form action="{{route('attendances.destroy',$evaluator->pivot->id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <x-form-submission-button class="bg-red-500">
                                {!! __('remove from jiri') !!}
                            </x-form-submission-button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- ************* -->
        <!-- Les étudiants -->
        <!-- ************* -->
        <section class="flex flex-col gap-2">
            <header>
                <h2 class="text-2xl font-bold first-letter:capitalize">{!! __('list of the students') !!}</h2>
                <p class="first-letter:capitalize">{!! __('sorted by family name') !!}</p>
            </header>

            <ul class="flex flex-col gap-4">
                @foreach($jiri->students as $student)
                    <li class="flex items-center gap-2">
                        <a href=""
                           class="underline text-blue-500 inline-block first-letter:capitalize">{{ $student->full_name }}</a>
                        <form action="{{route('attendances.update',$student->pivot->id)}}"
                              method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden"
                                   name="role"
                                   value="{{ \App\Enums\ContactRoles::Evaluator->value }}">
                            <x-form-submission-button class="bg-green-500">
                                {!! __('change role to evaluator') !!}
                            </x-form-submission-button>
                        </form>
                        <form action="{{route('attendances.destroy',$student->pivot->id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <x-form-submission-button class="bg-red-500">
                                {!! __('remove from jiri') !!}
                            </x-form-submission-button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- *********** -->
        <!-- Les projets -->
        <!-- *********** -->
        <section class="flex flex-col gap-2">
            <header>
                <h2 class="text-2xl font-bold first-letter:capitalize">{!! __('list of the projects') !!}</h2>
                <p class="first-letter:capitalize">{!! __('sorted by name') !!}</p>
            </header>

            <ul class="flex flex-col gap-4">
                @foreach($jiri->projects as $project)
                    <li class="flex items-center gap-2">
                        <a href=""
                           class="underline text-blue-500 inline-block first-letter:capitalize">{{ $project->name }}</a>
                        <form action="{{ route('assignments.destroy', $project->pivot->id) }}"
                              method="post">
                            @csrf
                            @method('delete')
                            <x-form-submission-button class="bg-red-500">
                                {!! __('remove from jiri') !!}
                            </x-form-submission-button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
