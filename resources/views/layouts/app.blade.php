<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <meta name="csrf-token"
              content="{{ csrf_token() }}">
        <title>Jiris - {!! __('your jiris management app') !!}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="pb-4 font-sans">
        <a class="sr-only"
           href="#main-menu">{!! __('go to main menu') !!}</a>
        <div class="flex flex-col-reverse gap-6">
            <main class="flex flex-col gap-4 px-4">
                {{ $slot }}
            </main>
            <x-navigations.app />
        </div>
    </body>
</html>
