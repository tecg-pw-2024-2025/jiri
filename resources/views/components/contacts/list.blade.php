<ol>
    @foreach ($contacts as $contact)
        <li><a class="underline text-blue-500"
               href="{{ route('contacts.show',$contact) }}">{{ $contact->full_name }}</a></li>
    @endforeach
</ol>
