@props(['icon' => null])

<button type="submit"
    {{ $attributes->class(['font-bold text-white rounded-md p-2 px-4 tracking-wider flex gap-2']) }}>
    <span>{{ $slot }}</span>
    @if(!is_null($icon))
        <x-dynamic-component class="w-6"
                             :component="$icon" />
    @endif
</button>
