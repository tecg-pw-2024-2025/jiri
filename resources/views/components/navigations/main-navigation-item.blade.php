@props(['route', 'text'])
<li {{ $attributes }}><a class="underline text-white uppercase tracking-wider"
                         href="{{ route($route) }}">{!! __($text) !!}</a></li>
