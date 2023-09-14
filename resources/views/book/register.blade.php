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
        <h1>本の登録</h1>
        <form action="/myshelf/books" method="POST">
            @csrf
            <div class="title">
                <h2>本のタイトル</h2>
                <input type="text" name="book[title]" placeholder="本のタイトルを入力"/>
            </div>
            <select name='book[kind_id]'>
                @foreach($kinds as $kind)
                    <option value="{{ $kind->id }}">{{ $kind->kind }}</option>
                @endforeach
            </select>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        </center>
    </body>
    </x-app-layout>
</html>