<header {{$attributes->class(['p-4', 'bg-blue-600'])}}>
    <nav id="main-menu"
         class="font-medium flex justify-between">
        <h2 class="sr-only">{!! __('main menu') !!}</h2>
        <x-application-logo class="w-12 h-12" />
        <ul class="flex flex-row gap-4 items-center">
        {{ $items }}
        </ul>
    </nav>
</header>
