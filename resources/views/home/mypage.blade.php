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
            {{ __('Mypage') }}
        </h2>
    </x-slot>
    <body class="antialiased">

            <h1>{ユーザーネーム}のマイページ</h1>
            
            <div>
                <h2>メモ</h2>
            </div>
            
            <div>
                <h2>一週間の読書量</h2>
                <p>今日は</p>
                <p>datatime</p>
            </div>
            
            <div>
                <h2>本の評価</h2>
                <h4>漫画</h4>
                <h4>小説</h4>
            </div>
            
    </body>
    </x-app-layout>
</html>