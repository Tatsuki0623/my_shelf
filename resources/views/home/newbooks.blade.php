<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新刊情報') }}
        </h2>
    </x-slot>
    <body class="antialiased">
        <div>
            <h1>
                新刊情報
            </h1>
        </div>
        <div>
            <p>検索</p>
        </div>
        
        <div>
            <p>ページトップへ</p>
        </div>
    </body>
    </x-app-layout>
</html>