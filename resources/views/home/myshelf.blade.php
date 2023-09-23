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
                {{$user->name}}の本棚
            </h2>
        </x-slot>
    <body>
        <center>
        <div>
            <div>
                <p>
                    <a href="/myshelf/users/{{$user->id}}/1">漫画</a>
                    <a href="/myshelf/users/{{$user->id}}/2">小説</a>
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
        
        <form action="/myshelf/users/{{$user->id}}/filter" method="GET">
            @csrf
            <div><h3>本棚を検索</h3></div>
            <div>
                <input type="text" name="title" placeholder="本のタイトルを入力"/>
            </div>
            <input type="hidden" name="kind_id" value="{{$kind_id}}">
            <input type="submit" value="検索"/>
        </form>
        
        <div>
            @if($books)
                @if($user->id == Auth::user()->id)
                    @foreach($books as $book)
                        <div>
                            <a href="/myshelf/books/users/{{$user->id}}/{{$book->id}}">{{$book->title}}</a>
                            <img src="{{$book->image}}" width="100" height="50"/>
                        </div>
                        <div>
                            <form action="/myshelf/books/users/{{$user->id}}/{{$book->id}}" id="form_{{$book->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{$book->id}})">削除</button> 
                            </form>
                        </div>
                    @endforeach
                @else
                    @foreach($books as $book)
                        <div>
                            <a href="/myshelf/books/users/{{$user->id}}/{{$book->id}}">{{$book->title}}</a>
                            <img src="{{$book->image}}" width="100" height="50"/>
                        </div>
                    @endforeach
                @endif
            @else
                <p>本が登録されていません</p>
                <p>本の登録から新しく登録してください</p>
            @endif
        </div>
        
        <div class='paginate'>
            {{$books->links()}}
        </div>
        
        <div>
            <a href="/myshelf/users/{{$user->id}}/info">統計情報</a>
            @if($user->id == Auth::user()->id)
                <a href="/myshelf/books/register">本の登録</a>
            @else
                <a href="/mypage/users/{{$user->id}}">マイページへ</a>
            @endif
            <p><a href="#">ページトップへ戻る</a></p>
        </div>
        
        </center>
    </body>
    </x-app-layout>
</html>