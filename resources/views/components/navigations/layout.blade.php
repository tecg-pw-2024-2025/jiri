<header {{$attributes->class(['border-b border-b-blue-100 p-4'])}}>
    <nav id="main-menu"
         class="font-medium flex text-blue-900 items-center">
        <h2 class="sr-only">{!! __('main menu') !!}</h2>
        <a href="{{ route('home') }}"
           class="flex gap-2 items-center hover:underline">
            <x-icons.jiri />
            <span class="first-letter:capitalize text-lg">jiri</span>
        </a>
        <ul class="ms-auto flex flex-row gap-4 items-center">
            {{ $items }}
        </ul>
    </nav>
</header>
