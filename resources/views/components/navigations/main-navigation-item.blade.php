@props(['route', 'text'])
<li {{ $attributes }}>
    <x-link :route="route($route)">{!! __($text) !!}</x-link>
</li>
