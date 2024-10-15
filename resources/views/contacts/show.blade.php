<x-app-layout>
    <h1 class="text-xl text-blue-900 font-bold">{{ $contact->fullname }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('name of the contact') !!}</dt>
            <dd>{{ $contact->fullname }}</dd>
        </div>
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('email of the contact') !!}</dt>
            <dd>{{ $contact->email }}</dd>
        </div>
        @if(!is_null($contact->photo))
            <div>
                <dt class="font-bold first-letter:capitalize">{!! __('photo of the contact') !!}</dt>
                <dd>
                    @php
                        $sizes = Config::get('photos.sizes');
                        $search = array_keys($sizes)[0];
                    @endphp
                    <img src="{{ Storage::url(str_replace($search, 'cover', $contact->photo)) }}"
                         srcset="{{ Storage::url(str_replace($search, 'cover', $contact->photo)) }} {{  $sizes['cover']}}w,
                         {{ Storage::url(str_replace($search, 'large', $contact->photo)) }} {{ $sizes['large'] }}w"
                         alt="{{ $contact->fullname }}"
                         loading="lazy"
                         decoding="async"
                         width="{{ $sizes['cover'] }}"
                         height="{{ $sizes['cover'] }}"
                    >
            </div>
        @endif
    </dl>
    <div>
        <x-link :route="route('contacts.edit',$contact)">
            {!! __('update this contact') !!}
        </x-link>
    </div>
    <form action="{{ route('contacts.destroy',$contact) }}"
          method="post">
        @csrf
        @method('DELETE')
        <x-form-submission-button class="bg-red-700"
                                  icon="remove">
            {!! __('delete this contact') !!}
        </x-form-submission-button>
    </form>
</x-app-layout>
