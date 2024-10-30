<div>
    <form wire:submit.prevent="filter" class="mb-2">
        <x-input-with-label id="filter-contacts"
                            label-text="filter contacts by name"
                            name=""
                            model="filter"/>
    </form>
    @unless($this->contacts->count() === 0)
        <ol class="flex flex-wrap gap-6 justify-center">
            @foreach ($this->contacts as $contact)
                <li class="flex flex-col gap-2 p-4 bg-slate-50 rounded-2xl">
                    @php $dimensions = config('photos.sizes.cover') @endphp
                    <div
                        class="leading-0 rounded-[50%] p-4 w-[{{$dimensions*0.9}}px] h-[{{$dimensions*0.9}}px] flex justify-center items-center">
                        <img src="{{ Storage::url(str_replace('original', 'cover', $contact->photo)) }}"
                             alt=""
                             class="drop-shadow-md rounded-[50%]"
                             width="{{ $dimensions*0.9 }}"
                             height="{{ $dimensions*0.9 }}"
                        >
                    </div>
                    <x-link class="inline-block text-center font-bold"
                            :route="route('contacts.show',$contact)">
                        {{ $contact->full_name }}
                    </x-link>
                </li>
            @endforeach
        </ol>
    @else
        <p>{!! __('There is no contacts yet') !!}</p>
    @endunless
</div>
