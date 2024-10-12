<ol>
    @foreach ($contacts as $contact)
        <li>
            <x-link :route="route('contacts.show',$contact)">{{ $contact->full_name }}</x-link>
        </li>
    @endforeach
</ol>
