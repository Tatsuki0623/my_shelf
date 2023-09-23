<html> 
    <head>
        <meta charset="utf-8">
        <title>SearchBook</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$user->name}}の本棚
            </h2>
        </x-slot>
    <body>
        <center>
        <form action="/myshelf/books/{{$book->id}}/link/search" method="GET">
            @csrf
            <div><h3>楽天で検索</h3></div>
            <div>
                <input type="text" name="title" placeholder="本のタイトルを入力"/>
            </div>
            <input type="submit" value="検索"/>
        </form>
        <div>
        @if($items)
            <form action="/myshelf/books/{{$book->id}}/link" method="POST">
            @csrf
            @method('PUT')
            <select name="item">
            @foreach($items as $item)
                <option value="{{$item['itemUrl']}}&-&{{$item['largeImageUrl']}}">{{$item['title']}}</option>
            @endforeach
            </select>
            <p><input type="submit" value="決定"/></p>
            </form>
            
            @foreach($items as $item)
                <p>{{$item['title']}}</p>
                <img src="{{$item['largeImageUrl']}}" width="100" height="50"/>
            @endforeach
        @else
            <p>検索結果がありません</p>
            <p>検索ワードを入力してください</p>
        @endif
        </div>
        </center>
    </body>
    </x-app-layout>
</html>