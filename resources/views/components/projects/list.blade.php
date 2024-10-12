<ol>
    @foreach ($projects as $project)
        <li>
            <x-link :route="route('projects.show',$project)">{{ $project->name }}</x-link>
        </li>
    @endforeach
</ol>
