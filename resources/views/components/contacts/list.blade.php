<ol class="flex flex-wrap gap-6">
    @foreach ($contacts as $contact)
        <li class="flex flex-col gap-2 p-4 bg-slate-50 rounded">
            <div>
                <img src="{{ asset(str_replace('original', 'cover', $contact->photo)) }}"
                     alt=""
                     width="{{ config('photos.sizes.cover') }}"
                     height="{{ config('photos.sizes.cover') }}"
                >
            </div>
            <x-link class="text-center font-bold" :route="route('contacts.show',$contact)">{{ $contact->full_name }}</x-link>
            <p class="text-gray-500 text-center">{{  $contact->email }}</p>
        </li>
    @endforeach
</ol>
