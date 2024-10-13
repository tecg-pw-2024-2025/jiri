<ol>
    @foreach ($jiris as $jiri)
        <li>
            <x-link :route="route('jiris.show',$jiri)">{{ $jiri->name }}</x-link>
            <ul class="flex gap-2 items-baseline text-gray-500">
                <li>{{  $jiri->students_count }} {!! __('student(s)') !!}</li>
                <li>{{  $jiri->evaluators_count }} {!! __('evaluator(s)') !!}</li>
                <li>{{  $jiri->projects_count }} {!! __('project(s)') !!}</li>
            </ul>
        </li>
    @endforeach
</ol>
