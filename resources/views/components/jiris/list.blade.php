<ol>
    @foreach ($jiris as $jiri)
        <li><a class="underline text-blue-500"
               href="{{ route('jiris.show',$jiri) }}">{{ $jiri->name }}</a></li>
    @endforeach
</ol>
