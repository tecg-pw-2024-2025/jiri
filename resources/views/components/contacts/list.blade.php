<ol class="flex flex-wrap gap-6 justify-center">
    @foreach ($contacts as $contact)
        <li class="flex flex-col gap-2 p-4 bg-slate-50 rounded-2xl">
            @php $dimensions = config('photos.sizes.cover') @endphp
            <div class="leading-0 rounded-[50%] p-4 w-[{{$dimensions*0.9}}px] h-[{{$dimensions*0.9}}px] flex justify-center items-center">
                <img src="{{ asset(str_replace('original', 'cover', $contact->photo)) }}"
                     alt=""
                     class="drop-shadow-md rounded-[50%]"
                     width="{{ $dimensions*0.9 }}"
                     height="{{ $dimensions*0.9 }}"
                >
            </div>
            <x-link class="text-center font-bold" :route="route('contacts.show',$contact)">{{ $contact->full_name }}</x-link>
        </li>
    @endforeach
</ol>
