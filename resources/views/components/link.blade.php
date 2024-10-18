@props([
    'route',
     'icon' => null,
     'iconPosition' => 'before',
])
@php $gap = !is_null($icon) ? 'flex gap-2' : '' @endphp

<div {{ $attributes->class(['underline text-blue-700 '.$gap]) }}>

    @if(!is_null($icon) && $iconPosition ==='before')
        <x-dynamic-component :component="'icons.'.$icon"
                             class="w-6"/>
    @endif

    <a href="{{ $route }}">{{ $slot }}</a>

    @if(!is_null($icon) && $iconPosition ==='after')
        <x-dynamic-component :component="$icon"
                             class="w-6"/>
    @endif

</div>
