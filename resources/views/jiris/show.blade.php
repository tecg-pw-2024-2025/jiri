<x-app-layout>
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

    <div>
        <h2 class="text-2xl font-bold">{!! __('list of the evaluators') !!}</h2>
        <ul class="flex flex-col gap-4">
            @foreach($jiri->evaluators as $evaluator)
                <li>
                    <a href=""
                       class="underline text-blue-500 inline-block first-letter:capitalize">{{ $evaluator->full_name }}</a>
                    <form action="{{route('attendances.update',$evaluator->pivot->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden"
                               name="role"
                               value="{{ \App\Enums\ContactRoles::Student->value }}">
                        <x-form-submission-button class="bg-green-500">
                            {!! __('change role to student') !!}
                        </x-form-submission-button>
                    </form>
                </li>
            @endforeach
        </ul>


        <h2 class="text-2xl font-bold">{!! __('list of the students') !!}</h2>
        <ul class="flex flex-col gap-4">
            @foreach($jiri->students as $student)
                <li>
                    <a href=""
                       class="underline text-blue-500 inline-block first-letter:capitalize">{{ $student->full_name }}</a>
                    <form action="{{route('attendances.update',$student->pivot->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden"
                               name="role"
                               value="{{ \App\Enums\ContactRoles::Evaluator->value }}">
                        <x-form-submission-button class="bg-green-500">
                            {!! __('change role to evaluator') !!}
                        </x-form-submission-button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
