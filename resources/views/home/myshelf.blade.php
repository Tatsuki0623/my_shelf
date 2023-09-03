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
            {{ __('私の本棚') }}
        </h2>
    </x-slot>
    <body class="antialiased">
        <div>
            {種類}へ
        </div>
        
        <div>
            <h2>
                {種類}
            </h2>
        </div>
        <div>
            <p>本の追加</p>
            <p>検索</p>
        </div>
        
        <div>
            <p>統計情報</p>
            <p>本の追加</p>
            <p>ページトップへ</p>
        </div>
    </body>
    </x-app-layout>
</html>