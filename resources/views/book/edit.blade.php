<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   
    <head>
        <meta charset="utf-8">
        <title>AddBook</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('私の本棚') }}
            </h2>
        </x-slot>
    <body>
        <center>
        <h1>{{$book->title}}</h1>
        <form action="/myshelf/books/{{$book->id}}" method="POST">
        @csrf
            <div class="title">
                <h2>感想</h2>
                <textarea name="book[impression]" rows="6" cols="40">140字以内で感想をお書きください</textarea>
            </div>
            <div>
                <h2>点数</h2>
                <input type="number" name="book[point]" placeholder="点数を100点満点で入力" min="0" max="100"/>
            </div>
            <div>
                <h2>何巻まで持っているか</h2>
                <input type="number" name="book[volume]" placeholder="何巻までもってる？"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>