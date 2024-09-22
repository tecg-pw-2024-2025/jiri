<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">

        <title>Jiri</title>

        <!-- Fonts -->
        <link rel="preconnect"
              href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
              rel="stylesheet" />

        @vite('resources/css/app.css')
    </head>
    <body class="pb-4 font-sans">
        <a class="sr-only"
           href="#main-menu">Aller au menu principal</a>
        <div class="flex flex-col-reverse gap-6">
            <main class="flex flex-col gap-4 px-4">
                {{ $slot }}
            </main>
            <div class="p-4 bg-blue-600">
                <x-navigations.main></x-navigations.main>
            </div>
        </div>
    </body>
</html>
