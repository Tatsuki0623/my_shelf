<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   
    <head>
        <meta charset="utf-8">
        <title>editmemo</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('マイページ') }}
            </h2>
        </x-slot>
    <body>
    <center>
        <h1>メモの編集</h1>
        <form action="/mypage/memos/{{$memo->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>メモのタイトル</h2>
                <input type="text" name="memo[title]" placeholder="本のタイトルを入力" value="{{$memo->title}}" size="50"/>
                <p class="title__error" style="color:red">{{$errors->first('memo.title')}}</p>
            </div>
            <div class="title">
                <h2>メモのタイトル</h2>
                <textarea name="memo[body]" rows="6" cols="40" placeholder="600文字以下で入力してください">{{$memo->body}}</textarea>
                <p class="body__error" style="color:red">{{$errors->first('memo.body')}}</p>
            </div>
            <p><input type="submit" value="保存"/></p>
        </form>
        <div class="back">[<a href="javascript:history.back()">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>