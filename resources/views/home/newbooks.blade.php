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
            {{ __('新刊情報') }}
        </h2>
    </x-slot>
    <body class="antialiased">
        <center>
        <div>
            <div>
                <p>検索</p> 
            </div>
            <div>
                <form action="/newbooks" method="GET">
                @csrf
                <div><h3>楽天で検索</h3></div>
                <div>
                    <input type="text" name="title" placeholder="本のタイトルを入力" size="60"/>
                </div>
                    <input type="submit" value="検索"/>
                </form>
            </div>
        </div>
        <div>
            @if($keyword)
                <p>{{$keyword}}で検索</p>
            @endif
            @if($items)
                @foreach($items as $item)
                    <div>
                        <a href="{{$item['itemUrl']}}">{{$item['title']}}</a>
                        <img src="{{$item['largeImageUrl']}}"/>
                    </div>
                @endforeach
            @else
                <p>検索結果がありません</p>
                <p>検索ワードを入力してください</p>
            @endif
        </div>
        
        
        <div>
            <p>ページトップへ</p>
        </div>
        </center>
    </body>
    </x-app-layout>
</html>