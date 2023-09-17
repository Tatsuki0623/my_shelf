<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   
    <head>
        <meta charset="utf-8">
        <title>AddBook</title>
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
            <h1>{{$book->title}}</h1>
            <p>の編集画面</p>
            <form action="/myshelf/books/{{$book->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>本のタイトル</h2>
                    <input type="text" name="book[title]" placeholder="本のタイトルを入力" value="{{$book->title}}" size="50"/>
                    <p class="title__error" style="color:red">{{$errors->first('book.title')}}</p>
                </div>
                <div class>
                    <h2>感想</h2>
                    <textarea name="book[impression]" rows="6" cols="40" placeholder="140文字以下で入力してください">{{$book->impression}}</textarea>
                    <p class="impression__error" style="color:red">{{$errors->first('book.impression')}}</p>
                </div>
                <div>
                    <h2>点数</h2>
                    <input type="number" name="book[point]" placeholder="100点満点で入力" value="{{$book->point}}"/>
                    <p class="point__error" style="color:red">{{$errors->first('book.point')}}</p>
                </div>
                <div>
                    <h2>何巻まで持っているか</h2>
                    <input type="number" name="book[volume]" placeholder="何巻までもってる？" value="{{$book->volume}}"/>
                    <p class="volume__error" style="color:red">{{$errors->first('book.volume')}}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/myshelf/books/{{$book->id}}">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>