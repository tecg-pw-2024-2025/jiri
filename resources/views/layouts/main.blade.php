<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-stone-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <title>Jiris - {!! __('your jiris management app') !!}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 grid-layout-template">
<a class="sr-only skip"
   href="#main-menu">{!! __('go to main menu') !!}</a>
<div class="flex flex-col gap-6 content items-center w-full">
    <main class="flex flex-col gap-4 px-4 order-2 lg:w-2/3 md:w-3/4 xl:w-1/2">
        {{ $slot }}
    </main>
    {{ $navigation }}
</div>
<x-main-footer/>
</body>
</html>
