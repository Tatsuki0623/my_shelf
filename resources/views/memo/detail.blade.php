<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>メモの詳細</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script>
            function deleteMemo(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
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
            <div>
            <form action="/mypage/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteMemo({{$memo->id}})">削除</button> 
            </form>
        </div>
            <div class="edit">
                <a href="/mypage/memos/{{$memo->id}}/edit">edit</a>
            </div>
            <div class="back">[<a href="/mypage/users/{{Auth::user()->id}}">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>