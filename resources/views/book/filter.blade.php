<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MyShelf</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('私の本棚') }}
            </h2>
        </x-slot>
    <body>
        <center>
        <div>
            <div>
                <p>
                    <a href="/myshelf/users/{{$user_id}}/1">漫画</a>
                    <a href="/myshelf/users/{{$user_id}}/2">小説</a>
                </p>
            </div>
            
            <div>
                @if($kind_id == 1)
                    <h1>漫画</h1>
                @else
                    <h1>小説</h1>
                @endif
            </div>
            <a href="/myshelf/books/register">本の登録</a>
        </div>
        <form action="/myshelf/users/{{$user_id}}/filter" method="GET">
            @csrf
            <div><h3>本棚を検索</h3></div>
            <div>
                <input type="text" name="title" placeholder="本のタイトルを入力"/>
            </div>
            <input type="hidden" name="kind_id" value="{{ $kind_id}}">
            <input type="submit" value="検索"/>
        </form>
        <h3>{{$keyword}}で検索</h3>
        <div>
        @if($filters)
            @foreach($filters as $book)
                <div>
                    <a href="/myshelf/books/{{$book->id}}">{{$book->title}}</a>
                    <img src="{{$book->image}}" width="100" height="50"/>
                </div>
                <div>
                    <form action="/myshelf/books/{{$book->id}}" id="form_{{$book->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{$book->id}})">削除</button> 
                    </form>
                </div>
            @endforeach
        @else
            <p>検索結果がありません</p>
            <p>検索ワードを入力してください</p>
        @endif
        </div>
        
        <div class='paginate'>
            {{$filters->links ?? null}}
        </div>
        
        <div>
            <a href="/myshelf/users/{{$user_id}}/info">統計情報</a>
            <a href="/myshelf/books/register">本の登録</a>
            <p>ページトップへ</p>
        </div>
        
        </center>
    </body>
    </x-app-layout>
</html>