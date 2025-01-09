<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-blue-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('storage/images/car.png') }}">
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="bg-blue-50">
        {{ $slot }}
        @livewireScripts


        <footer class="min-h-40 bg-gray-400 w-full mt-10"> 
        </footer>
    </body>
</html>