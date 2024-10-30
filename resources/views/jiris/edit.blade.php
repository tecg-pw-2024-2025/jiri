<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize">{!! __('update this jiri')  !!}</h1>
    <x-jiri-form action="{{ route('jiris.update',$jiri) }}"
                 method="post"
                 class="flex flex-col gap-8 bg-slate-50 p-4">

        @csrf
        @method('PATCH')

        <x-input-with-label type="text"
                            id="name"
                            name="name"
                            :value="old('name',$jiri)"
                            label-text="name"
                            help-text="min 3 chars, max 255"
                            placeholder="jiri name"
                            autofocus="true"
                            required
        />

        @php($now = now()->format('Y-m-d H:i'))
        @php($current_date = $jiri->starting_at->format('Y-m-d H:i'))

        <x-input-with-label type="text"
                            id="starting_at"
                            name="starting_at"
                            :value="old('starting_at',$current_date)"
                            label-text="starting at"
                            help-text="formated like 1970-01-01 00:00"
                            :placeholder="$now"
        />

        <div>
            <x-form-submission-button class="bg-blue-700"
                                      icon="update">
                {!! __('update this jiri') !!}
            </x-form-submission-button>
        </div>
    </x-jiri-form>
</x-app-layout>
