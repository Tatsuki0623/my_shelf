<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   
    <head>
        <meta charset="utf-8">
        <title>本の詳細</title>
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
                <h2>title</h2>
            </div>
            <div>
                <a href="{{$book->link_rakuten ?? null}}">{{$book->title}}</a>
                <img src="{{$book->image ?? "/no_image.jpg"}}" width="200" height="100"/>
            </div>
        </div>
        <div>
            <P>
                <a href="/myshelf/books/{{$book->id}}/link/search">リンクをつける</a>
            </p>
        </div>
        <div>
            <div>
                <h2>感想</h2>
            </div>
            <div>
                <p>{{$book->impression ?? ""}}</p>
            </div>
        </div>
        <div>
            <div>
                <h3>{{$book->point ?? 0}}
            </div>
            <p>点</p>
        </div>
        <div>
            <h3>何巻まで持っているか</h3>
            <div>
                @if($book->volume == null)
                    <p>巻数は登録されていません</p>
                @else
                    <p>{{$book->volume}}巻までもっています</p>
                @endif
            </div>
        </div>
        <div>
            <form action="/myshelf/books/{{$book->id}}" id="form_{{$book->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{$book->id}})">削除</button> 
            </form>
        </div>
        <button onclick="location.href='/myshelf/books/{{$book->id}}/edit'">編集</button>
        <div class="back">[<a href="/myshelf/{{$book->kind_id}}">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>