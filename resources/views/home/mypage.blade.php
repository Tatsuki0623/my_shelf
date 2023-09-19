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
            マイページ
        </h2>
    </x-slot>
    <body class="antialiased">
        <center>
            <h1>{{Auth::user()->name}}のマイページ</h1>
            <div>
                <h2>メモ</h2>
                <div>
                    @if($memos)
                        @foreach($memos as $memo)
                            <div>
                                <p>
                                    <a href="/mypage/memos/{{$memo->id}}">{{$memo->title}}</a>
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <p>メモが登録されていません</p>
                            <p>メモの追加から新しく登録してください</p>
                        </div>
                    @endif
                </div>
                <div>
                    <a href="/mypage/memos/add">メモの追加</a>
                </div>
            </div>
            
            <div>
                <h2>一週間の読書量</h2>
                <div>
                    <form 
                </div>
            </div>
            
            <div>
                <p>今日は</p>
                <p>DateTime</p>
            </div>
            <div>
                <h2>本の評価</h2>
                @foreach($book_list as $index => $books)
                    <div>
                        <h1>{{$index}}</h1>
                    @if($books)    
                            <div>
                                <ul>
                        @foreach($books as $book)
                                    <li><a href="myshelf/books/{{$book->id}}" name="{{$book->point}}">{{$book->point}}:{{$book->title}}</a></li>
                        @endforeach
                                </ul>
                            </div>
                    @else
                        <h2>何も入ってないよ</h2>
                    @endif
                    </div>
                @endforeach
            </div>
        
        </center>
            
    </body>
    </x-app-layout>
</html>