<ol>
    @foreach ($projects as $project)
        <li><a class="underline text-blue-500"
               href="{{ route('projects.show',$project) }}">{{ $project->name }}</a></li>
    @endforeach
</ol>
