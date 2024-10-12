<ol>
    @foreach ($jiris as $jiri)
        <li>
            <x-link :route="route('jiris.show',$jiri)">{{ $jiri->name }}</x-link>
        </li>
    @endforeach
</ol>
