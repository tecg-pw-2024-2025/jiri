<x-navigations.layout>
    <ul class="flex flex-row gap-4 justify-end">
        <li><a class="underline text-white uppercase tracking-wider"
               href="{{ route('register') }}">{!! __('register') !!}</a></li>
        <li><a class="underline text-white uppercase tracking-wider"
               href="{{ route('login') }}">{!! __('login') !!}</a></li>
    </ul>
</x-navigations.layout>
