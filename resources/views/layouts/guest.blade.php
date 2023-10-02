<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head class="mb-4 flex items-center justify-between py-4 md:py-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>{{ config('app.name', 'Laravel') }}</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            {{ $slot }}
        </div>
    </body>
</html>
