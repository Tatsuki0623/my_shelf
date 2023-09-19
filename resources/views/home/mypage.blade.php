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
                <h2>一週間の読書時間</h2>
                <div>
                    @if($read_times['week'])
                        @foreach($read_times['week'] as $read_time)
                            <p>{{$read_time->read_time}}</p>
                        @endforeach
                    @else
                        <p>読書時間が登録されていません</p>
                    @endif
                </div>
                <div>
                    <form action="/mypage/ReadTime" method="POST">
                        @csrf
                        <div>
                            <h2>今日の読書時間</h2>
                            <input type="number" name="ReadTime[read_time]" placeholder="{{$read_times['today']->read_time ?? '0'}}" min="0" max="24"/>
                            <p class="ReadTime__error" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                        </div>
                        <input type="submit" value="追加"/>
                    </form>
                </div>
            </div>
            
            <div>
                <p>今日は</p>
                <p>{{date('m-d')}}</p>
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