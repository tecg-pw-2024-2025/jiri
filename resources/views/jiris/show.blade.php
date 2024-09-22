<x-layouts.main>
    <h1 class="text-3xl font-bold">{{ $jiri->name }}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">Nom du jiri</dt>
            <dd>{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">Date et heure de début du jiri</dt>
            <dd>{{ $jiri->starting_at->diffForHumans() }}</dd>
            <dd>
                <time datetime="{{ $jiri->starting_at }}">
                    le {{ $jiri->starting_at->format('d M Y') }} à {{ $jiri->starting_at->format('H:i') }}</time>
            </dd>
        </div>
    </dl>
</x-layouts.main>
