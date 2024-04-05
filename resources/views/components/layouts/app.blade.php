<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ShopEase' }}</title>
        @vite(['resources\css\app.css', 'resources\js\app.js'])
        @livewireStyles
    </head>
    <body class="dark:bg-slate-700 dark:text-gray-300 bg-slate-300">
        @livewire('partials.navbar')
        <main>
            {{ $slot }}
        </main>
        @livewire('partials.footer')
        @livewireStyles
    </body>
</html>
