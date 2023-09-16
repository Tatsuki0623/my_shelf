<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MyShelf</title>
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
        <div>
            <div>
                <p>
                    <a href="/myshelf/1">漫画</a>
                    <a href="/myshelf/2">小説</a>
                </p>
            </div>
            
            <h2>{{$books->find(1)->kind->name ?? $books->find(2)->kind->name}}</h2>
            <a href="/myshelf/books/register">本の登録</a>
        </div>
        <form action="/myshelf/books/" method="POST">
            <div>
                <input type="text" name="book[title]" placeholder="本のタイトルを入力"/>
            </div>
            <input type="submit" value="検索"/>
        </form>
        
        <div>
            @if($books)
                @foreach($books as $book)
                    <div>
                        <a href="/myshelf/books/{{$book->id}}/show">{{$book->title}}</a>
                        <img src="{{$book->image}}" width="100" height="50"/>
                    </div>
                @endforeach
            @else
                <p>本が登録されていません</p>
                <p>本の登録から新しく登録してください</p>
            @endif
        </div>
        
        <div>
            <a href="/myshelf/books/info">統計情報</a>
            <a href="/myshelf/books/register">本の登録</a>
            <p>ページトップへ</p>
        </div>
        
        </center>
    </body>
    </x-app-layout>
</html>