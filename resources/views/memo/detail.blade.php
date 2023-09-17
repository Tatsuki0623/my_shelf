<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>メモの詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            マイページ
    </x-slot>
    <body>
        <center>
            <h1 class="title">
                {{$memo->title}}
            </h1>
            <div class="content">
                <div class="content__memo">
                    <h3>本文</h3>
                    <p>{{$memo->body}}</p>    
                </div>
            </div>
            <div class="edit">
                <a href="/mypage/memos/{{$memo->id}}/edit">edit</a>
            </div>
            <div class="footer">[<a href="/mypage">戻る]</a></div>
        </center>
    </body>
    </x-app-layout>
</html>