<x-app-layout>
    <h1 class="text-3xl font-bold">{{ $jiri->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('name of the jiri') !!}</dt>
            <dd>{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold first-letter:capitalize">{!! __('date and time of the jiri') !!}</dt>
            <dd class="first-letter:capitalize">{{ $jiri->starting_at->diffForHumans() }}</dd>
            <dd>
                <time datetime="{{ $jiri->starting_at }}" class="inline-block first-letter:capitalize">
                    {!! __('on') !!} {{ $jiri->starting_at->format('d M Y') }} {!! __('at') !!} {{ $jiri->starting_at->format('H:i') }}</time>
            </dd>
        </div>
    </dl>
    <div>
        <a href="{{ route('jiris.edit',$jiri) }}"
           class="underline text-blue-500 inline-block first-letter:capitalize">{!! __('update this jiri') !!}</a>
    </div>
    <form action="{{ route('jiris.destroy',$jiri) }}"
          method="post">
        @csrf
        @method('DELETE')
        <x-form-submission-button class="bg-red-500">
            {!! __('delete this jiri') !!}
        </x-form-submission-button>
    </form>
</x-app-layout>
