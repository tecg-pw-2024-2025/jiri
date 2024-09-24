<nav id="main-menu"
     class="font-bold">
    <h2 class="sr-only">{!! __($title)  !!}</h2>
    <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8 sm:items-center">
        @foreach($links as $link)
            <li><a class="underline text-white uppercase tracking-wider"
                   href="{{ $link['url'] }}">{!! __($link['title']) !!}</a></li>
        @endforeach
    </ul>
</nav>
