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
            <h2>
                私の本棚
            </h2>
        </div>
        <div>
            <h2>みんなの本棚</h2>
            <p>新たな出会いをあなたに</p>
        </div>
        <div>
            <div>
                @foreach($not_favorite_users as $user)
                    <div>
                        <form action="/othershelf/favorite" method="POST" name="{{$user->name}}フォーム">
                            @csrf
                            <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}">
                            <p>{{$user->name}}</p>
                            <input type="submit" value="お気に入り"/>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <br/>
        <div>
            @if($favorited_users)
                @foreach($favorited_users as $user)
                    <div>
                    <form action="/othershelf/favorite/{{$user->pivot->id}}" id="form_{{$user->pivot->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>
                            {{$user->name}}
                            <button type="button" onclick="deletePost({{$user->pivot->id}})">お気に入り解除</button>
                        </p>
                    </form>
                    </div>
                @endforeach
            @else
                <p>お気に入りユーザーは登録されていません</p>
            @endif
        </div>
        <br/>
        <div>
            <div>
                <p>-----------お気に入りユーザ----------</p>
            </div>
            <div>
                @if($favorited_users)
                    @foreach($favorited_users as $favorited_user)
                        <p>{{$favorited_user->name}}</p>
                    @endforeach
                @else
                    <p>お気に入りユーザーは登録されていません</p>
                @endif
            </div>
            <div>
                <p>------------------------------------</p>
            </div>
        </div>
        <br/>
        <div>
            <p>ページトップへ</p>
        </div>
        </center>
    </body>
    </x-app-layout>
</html>