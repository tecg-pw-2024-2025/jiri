@props(['icon' => null])

@php $gap = !is_null($icon) ? ' gap-2' : '' @endphp

<button type="submit"
    {{ $attributes->class(['text-white rounded-md p-2 tracking-wider flex'.$gap]) }}>
    <span>{{ $slot }}</span>
    @if(!is_null($icon))
        <x-dynamic-component class="w-6"
                             :component="'icons.'.$icon" />
    @endif
</button>
