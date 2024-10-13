<ol>
    @foreach ($contacts as $contact)
        <li>
            <x-link :route="route('contacts.show',$contact)">{{ $contact->full_name }}</x-link>
            <p class="text-gray-500">{{  $contact->email }}</p>
        </li>
    @endforeach
</ol>
