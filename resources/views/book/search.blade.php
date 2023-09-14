<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SearchBook</title>
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
        <form action="/myshelf/books/{{$book->id}}/link/edit" method="POST">
            @csrf
            <div class="title">
                <h2>楽天で検索</h2>
                <input type="text" name="book[title]" placeholder="本のタイトルを入力"/>
            </div>
            <input type="submit" value="検索"/>
        </form>
        
        <div>
            @if($items == null)
                <p>検索結果がありません</p>
                <p>検索ワードを入力してください</p>
            @else
                @foreach($items as $item)
                <ul>
                <li>
                    <p>{{$item->title}}</p>
                    <img src="{{$item->largeImageUrl}}" width="300" height="200"/>
                </li>
                </ul>
            @endif
        </div>
        </center>
    </body>
    </x-app-layout>
</html>