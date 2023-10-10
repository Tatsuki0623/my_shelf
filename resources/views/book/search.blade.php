<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}の本棚＿リンクの付与
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="bg-green-100 rounded-xl shadow-lg">
        <div class="relative px-4 py-10 sm:px-6 lg:py-16 lg:px-8">
            <div class="relative mx-auto max-w-2xl">
                <section>
                    <div class="mx-auto rounded-md shadow-lg bg-yellow-50">
                        <div class="text-center pt-4">
                            <div class="contents">
                                <div>
                                    <p class="bg-yellow-100 text-xl text-black-600 font-semibold shadow-md rounded-lg mx-60">リンクの付与</p>
                                </div>
                            </div>
                            <br/>
                        <div>
                            <form action="/myshelf/books/{{$book->id}}/link/search" method="GET">
                                @csrf
                                <div class="text-center">
                                    <div class="my-2">
                                        <div class="text-center">
                                            <h2 class="text-gray-700">楽天で検索</h2>
                                        </div>
                                        <div>
                                            <input type="text" name="title" class="shadow-lg rounded-md" placeholder="本のタイトルを入力"/>
                                        </div>
                                        <center class="py-5">
                                            <select name="kind_value" class="block rounded-lg border border-gray-300 bg-gray-50 text-base text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                                @foreach($kinds as $kind)
                                                    <option value="{{$kind->id}}">{{$kind->name}}</option>
                                                @endforeach
                                            </select>
                                        </center>
                                        <div>
                                            <input type="submit" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full" value="検索"/>
                                        </div>
                                    </div>
                                </div>            
                            </form>
                        </div>
                        @if($keyword)
                            <div class="py-10">
                                <div class="bg-yellow-100 mx-24 py-5 text-center roudede-xl shadow-xl">
                                    <h3>{{$keyword}}で検索</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
                
                <section class="body-font relative mx-10 content-center text-gray-600 py-10">
                    <div class="container mx-auto rounded-2xl bg-yellow-50 px-5 py-12 shadow-2xl">
                        <div class="py-10">
                            <div class="rounded-xl bg-yellow-100 shadow-xl">
                                <center>
                                    <div class="py-5">
                                        <button id="run" class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">カメラでバーコードを読み込む</button>
                                    </div>
                                    <div>
                                        <form action="/myshelf/books/{{$book->id}}/link/search" method="GET">
                                            @csrf
                                            <div id="stop"></div>
                                            <div id="interactive" class="viewport"></div>
                                            <div>
                                                <input id="code" name="isbn" type="text" class="w-auto rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" placeholder="9784から始まるバーコードをスキャンしてください" size="50"/>
                                            </div>
                                            <p class="isbn__error" style="color:red">{{$errors->first('book.isbn')}}</p>
                                            <div class="mx-56 rounded-lg bg-yellow-200 shadow-xl">
                                                <h2 class="my-5 text-center text-2xl text-stone-500">本の種類</h2>
                                            </div>
                                            <select name="kind_value" class="block rounded-lg border border-gray-300 bg-gray-50 text-base text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                                @foreach($kinds as $kind)
                                                    <option value="{{$kind->id}}">{{$kind->name}}</option>
                                                @endforeach
                                            </select>
                                            <div>
                                                <input type="submit" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full" value="検索"/>
                                            </div>
                                        </form>
                                    </div>
                                </center>
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
                                            @if($items)
                                                <center>
                                                    <div class="py-5">
                                                        <p class="bg-yellow-100 text-xl text-black-600 font-semibold shadow-md rounded-lg mx-auto">以下の項目から選択してください</p>
                                                    </div>
                                                    <form action="/myshelf/books/{{$book->id}}/link" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100">
                                                            <div class="py-6">
                                                                <select class="block text-base w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="item">
                                                                    @foreach($items as $item)
                                                                        <option value="{{$item['itemUrl']}}&-&{{$item['largeImageUrl']}}">{{$item['title']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="pb-10">
                                                                <p>
                                                                    <input class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-lime-500 hover:border-transparent rounded-lg shadow-md" type="submit" value="決定"/>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100 py-5 my-12">
                                                        <div class="grid gap-10 mx-auto lg:grid-cols-2 lg:max-w-none">
                                                            @foreach($items as $item)
                                                                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-50 text-center mx-auto">
                                                                    <div class="flex-shrink-0 text-center">
                                                                        <p class="py-5 text-xl bg-red-100 text-neutral-700">{{$item['title']}}</p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 text-center mx-auto my-auto">
                                                                        <img src="{{$item['largeImageUrl']}}" width="150" height="252"/>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            @else
                                                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100">
                                                    <div class="text-center text-red-400">
                                                        <p>検索結果がありません</p>
                                                    </div>
                                                </div>
                                            @endif
                                                </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
              </div>
        <footer>                                
            <div class="py-7 rounded-md shadow-lg bg-yellow-50">
                <div class="text-center">
                    <p class="pt-5"><a href="#" class="text-neutral-500 hover:text-blue-500">ページトップへ戻る</a></p>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>