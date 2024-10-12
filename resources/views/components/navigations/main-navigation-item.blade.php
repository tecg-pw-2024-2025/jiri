@props(['route', 'text'])
<li {{ $attributes }}><a class="underline tracking-wider"
                         href="{{ route($route) }}">{!! __($text) !!}</a></li>
