<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('お気に入りを解除します。\n本当に解除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </head>
    
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('みんなの本棚') }}
        </h2>
    </x-slot>
    <body class="antialiased">
        <center>
        <div>
            <div>
                <h2>本棚の公開</h2>
                <p>以下のボタンから自分の本棚を公開してみよう</p>
            </div>
            <div>
                @if(Auth::user()->public)
                    <form action="/othershelf/favorite/{{Auth::user()->id}}/public" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="title">
                            <input type="hidden" name="user[public]" value="0">
                            <input type="submit" value="非公開"/>
                        </div>
                    </form>
                @else
                    <form action="/othershelf/favorite/{{Auth::user()->id}}/public" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="title">
                            <input type="hidden" name="user[public]" value="1">
                            <input type="submit" value="公開"/>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <br/>
        <div>
            <h2>みんなの本棚</h2>
            <p>新たな出会いをあなたに</p>
        </div>
        <br/>
        <div>
            <div>
                <p>---------------------------お気に入りユーザ-----------------------</p>
            </div>
            <div>
            @if($favorited_users)
                @foreach($favorited_users as $user)
                    <div>
                        <div>==================================</div>
                        <form action="/othershelf/favorite/{{$user->id}}/detach" id="form_{{$user->pivot->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <p>{{$user->name}}</p>
                            <p>
                                <a href="/othershelf/users/{{$user->id}}/1">本棚へ</a>
                                <a href="/mypage/users/{{$user->id}}">マイページへ</a>
                            </p>
                            <button type="submit" onclick="deletePost({{$user->id}})">お気に入り解除</button>
                        </form>
                        <div>==================================</div>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{$favorited_users->links()}}
                </div>
            @else
                <p>お気に入りユーザーは登録されていません</p>
            @endif
        </div>
            <div>
                <p>---------------------------------------------------------</p>
            </div>
        </div>
        <br/>
        <div>
            <div>
                @foreach($users as $user)
                    <div>
                        <p>----------------------------------------</p>
                        <p>{{$user->name}}</p>
                        <p>
                            <a href="/othershelf/users/{{$user->id}}/1">本棚へ</a>
                            <a href="/mypage/users/{{$user->id}}">マイページへ</a>
                        </p>
                    </div>
                    @if($check->checkFavorite($user->id))
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
                    <div>
                        <p>-----------------------------------</p>
                    </div>
                @endforeach
                <div class='paginate'>
                    {{$users->links()}}
                </div>
            </div>
        </div>
        <br/>
        <div>
            <p><a href="#">ページトップへ戻る</a></p>
        </div>
        </center>
    </body>
    </x-app-layout>
</html>