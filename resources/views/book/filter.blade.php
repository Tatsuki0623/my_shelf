<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}の本棚
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
        function deleteBook(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-slot>
    <div class="bg-green-100 rounded-xl shadow-lg">
        <div class="relative px-4 py-10 sm:px-6 lg:py-16 lg:px-8">
            <div class="relative mx-auto max-w-2xl">
                <section>
                    <div class="mx-auto rounded-md shadow-lg bg-yellow-50">
                        <div class="text-center pt-4">
                            <div class="contents">
                                <div>
                                    @if($kind_id == 1)
                                        <a href="/myshelf/users/{{$user->id}}/1" class="bg-yellow-100 text-xl text-black-600 hover:text-blue-500 font-semibold shadow-md rounded-lg mx-auto">漫画</a>
                                        <a href="/myshelf/users/{{$user->id}}/2" class="text-xl font-semibold text-neutral-600 hover:text-blue-500">小説</a>
                                    @else
                                        <a href="/myshelf/users/{{$user->id}}/1" class="text-xl font-semibold text-neutral-600 hover:text-blue-500">漫画</a>
                                        <a href="/myshelf/users/{{$user->id}}/2" class="bg-yellow-100 text-xl text-black-600 hover:text-blue-500 font-semibold shadow-md rounded-lg mx-auto">小説</a>
                                    @endif
                                </div>
                            </div>
                            <br/>
                            @if($user->id == Auth::user()->id)
                                <div class="pt-5">
                                    <a href="/myshelf/books/register" class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-lime-500 hover:border-transparent rounded-lg shadow-md">本の登録</a>
                                </div>
                            @endif
                        </div>
                        <div>
                            <form action="/myshelf/users/{{$user->id}}/filter" method="GET">
                                @csrf
                                <div class="text-center">
                                    <div class="my-2">
                                        <div class="text-center">
                                            <h3>
                                                本棚を検索
                                            </h3>
                                        </div>
                                        <div>
                                            <input type="text" name="title" class="shadow-lg rounded-md" placeholder="本のタイトルを入力"/>
                                        </div>
                                        <div>
                                            <input type="hidden" name="kind_id" value="{{$kind_id}}">
                                            <input type="submit" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full" value="検索"/>
                                        </div>
                                    </div>
                                </div>            
                            </form>
                        </div>
                        <div class="py-10">
                            <div class="bg-yellow-100 mx-24 py-5 text-center">
                                <h3>{{$keyword}}で検索</h3>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section>
                    <div class="relative px-4 py-10 sm:px-6 lg:py-16 lg:px-8">
                        <div class="relative  mx-auto max-w-2xl">
                            <div class="mx-auto rounded-md shadow-lg bg-yellow-50">
                                <div class="text-center pt-5">
                                    <div class="relative px-5 py-10 sm:px-6 lg:py-16 lg:px-8">
                                        <div class="relative mx-auto max-w-2xl">
                                            
                                            <div class="grid gap-10 mx-auto lg:grid-cols-2 lg:max-w-none">
                                                @if($filters['0'] ?? null)
                                                    @if($user->id == Auth::user()->id)
                                                        @foreach($filters as $book)
                                                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100">
                                                                <div class="flex-shrink-0 mx-auto">
                                                                    <img src="{{$book->image ?? "/no_image.jpg"}}"/>
                                                                </div>
                                                                <div class="flex flex-col justify-between bg-white py-5 routede-xl">
                                                                    <div class="flex-1">
                                                                        <a href="/myshelf/books/users/{{$user->id}}/{{$book->id}}" class="block mt-2">
                                                                            <p class="text-xl text-neutral-500 hover:text-blue-500 font-semibold">{{$book->title}}</p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <form action="/myshelf/books/{{$book->id}}" id="form_{{$book->id}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" class="bg-red-400 hover:bg-red-500 text-lime-100 font-bold my-2 px-4 rounded-full" onclick="deleteBook({{$book->id}})">削除</button> 
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        @foreach($filters as $book)
                                                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100">
                                                                <div class="flex-shrink-0 mx-auto">
                                                                    <img src="{{$book->image ?? "/no_image.jpg"}}"/>
                                                                </div>
                                                                <div class="flex flex-col justify-between bg-white py-5 routede-xl">
                                                                    <div class="flex-1">
                                                                        <a href="/myshelf/books/users/{{$user->id}}/{{$book->id}}" class="block mt-2">
                                                                            <p class="text-xl text-neutral-500 hover:text-blue-500 font-semibold">{{$book->title}}</p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <div class="pt-5">
                                                        @if($filters->links()->elements['0'] ?? null)
                                                            <div class="pt-5">
                                                                <div class='paginate pt-5 bg-yellow-100'>
                                                                    {{$filters->onEachSide(3)->links()}}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    </div>
                                                        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100">
                                                            <div class="text-center text-red-400">
                                                                <p>検索結果がありませんでした</p>
                                                            </div>
                                                        </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                
                @if($user->id != Auth::user()->id)
                    <section>
                        <div class="relative px-4 py-10 sm:px-6 lg:py-16 lg:px-8">
                            <div class="relative  mx-auto max-w-2xl">
                                <div class="mx-auto rounded-md shadow-lg bg-yellow-50">
                                    <div class="text-center pt-4 mx-auto">
                                        <div class="relative px-5 py-10 sm:px-6 lg:py-16 lg:px-8">
                                            <div class="relative mx-auto max-w-2xl">
                                                <div class="py-5">
                                                    <a class="text-black hover:text-blue-500" href="/mypage/users/{{$user->id}}">{{$user->name}}のマイページへ</a>
                                                </div>
                                                @if($user->checkFavorite($user->id))
                                                    <div>
                                                        <form action="/othershelf/favorite/{{$user->id}}/detach" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-transparent hover:bg-red-400 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-red-400 hover:border-transparent rounded-lg shadow-md">お気に入り解除</button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div>
                                                        <form action="/othershelf/favorite/{{$user->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                                            @csrf
                                                            <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}">
                                                            <input type="submit" class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-lime-500 hover:border-transparent rounded-lg shadow-md" value="お気に入り"/>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
        </div>
        <footer>                                
            <div class="py-7 rounded-md shadow-lg bg-yellow-50">
                <div class="text-center">
                    @if($user->id == Auth::user()->id)
                        <div class="pt-5">
                            <a href="/myshelf/books/register" class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-lime-500 hover:border-transparent rounded-lg shadow-md">本の登録</a>
                        </div>
                    @endif
                    <div class="pt-5">
                        <a href="/myshelf/users/{{$user->id}}/info" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full">統計情報</a>
                    </div>
                    <p class="pt-5"><a href="#" class="text-neutral-500 hover:text-blue-500">ページトップへ戻る</a></p>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>