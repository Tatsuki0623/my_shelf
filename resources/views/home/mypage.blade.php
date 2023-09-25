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
            {{$user->name}}のマイページ
        </h2>
    </x-slot>
    <body class="antialiased">
        <center>
            @if($user->id == Auth::user()->id)
                <div>
                    <h2>メモ</h2>
                    <div>
                        @if($memos)
                            <div>
                            @foreach($memos as $memo)
                                <ul>
                                    <li>
                                        <a href="/mypage/memos/{{$memo->id}}">{{$memo->title}}</a>
                                    </li>
                                </ul>
                            @endforeach
                            </div>
                            <div class='paginate'>
                                <p>{{$memos->links() ?? null}}</p>
                            </div>
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
                <br/>
                <div>
                    @if($read_times['today'])
                        <form action="/mypage/ReadTime/{{$read_times['today']->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <h2>今日の読書時間</h2>
                                <input type="number" name="ReadTime[read_time]" placeholder="{{$read_times['today']->read_time}}" min="0" max="24"/>
                                <p class="ReadTime__error" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                            </div>
                            <input type="submit" value="変更"/>
                        </form>
                    @else
                        <form action="/mypage/ReadTime" method="POST">
                            @csrf
                            <div>
                                <h2>今日の読書時間</h2>
                                <input type="number" name="ReadTime[read_time]" placeholder="0" min="0" max="24"/>
                                <p class="ReadTime__error" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                            </div>
                            <input type="submit" value="追加"/>
                        </form>
                    @endif
                </div>
            @endif
            
            <div>
                <h2>一週間の読書時間</h2>
                <div>
                    @if($read_times['week'])
                        @foreach($read_times['week'] as $read_time)
                            <p>{{$read_time->read_time}}</p>
                        @endforeach
                        <div class='paginate'>
                            {{$read_times['week']->links() ?? null}}
                        </div> 
                    @else
                        <p>読書時間が登録されていません</p>
                    @endif
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
                                    <li><a href="/myshelf/books/users/{{$user->id}}/{{$book->id}}" name="{{$book->point}}">{{$book->point}}:{{$book->title}}</a></li>
                        @endforeach
                                </ul>
                            </div>
                    @else
                        <h2>何も入ってないよ</h2>
                    @endif
                    </div>
                @endforeach
            </div>
            
            @if($user->id != Auth::user()->id)
                <div>
                    <p><a href="/othershelf/users/{{$user->id}}/1">本棚へ</a></p>
                </div>
                <div>
                    @if($user->checkFavorite($user->id))
                        <div>
                            <form action="/othershelf/favorite/{{$user->id}}/detach" id="form_{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="deletePost({{$user->id}})">お気に入り解除</button>
                            </form>
                        </div>
                    @else
                        <div>
                            <form action="/othershelf/favorite/{{$user->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                @csrf
                                <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}">
                                <input type="submit" value="お気に入り"/>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
        
            <p><a href="#">ページトップへ戻る</a></p>
        </center>
            
    </body>
    </x-app-layout>
</html>