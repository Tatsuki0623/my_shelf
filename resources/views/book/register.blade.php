<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{Auth::user()->name}}の本棚＿本の登録</h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="bg-green-100 py-12">
        <section class="body-font relative mx-10 content-center text-gray-600">
            <div class="container mx-auto rounded-2xl bg-yellow-50 px-5 py-12 shadow-2xl">
                <div class="mb-12 flex w-full flex-col justify-center text-center">
                    <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">本の登録</h1>
                </div>
                <div class="h-auto rounded-xl bg-yellow-100 shadow-xl">
                    <form action="/myshelf/books" method="POST">
                        @csrf
                        <div class="mx-auto md:w-2/3 lg:w-1/2">
                            <div class="py-5">
                                <div class="mx-auto rounded-lg bg-yellow-200 shadow-xl">
                                    <h2 class="text-center text-2xl text-stone-500">本のタイトル</h2>
                                </div>
                                <div class="py-5 text-center">
                                    <input type="text" name="book[title]" class="w-auto rounded border border-gray-300 bg-gray-100 bg-opacity-50 mx-auto px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" placeholder="本のタイトルを入力" value="{{old('book.title')}}"/>
                                    <p class="title__error" style="color:red">{{$errors->first('book.title')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-5">
                            <div class="mx-auto rounded-lg bg-yellow-200 shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">本の種類</h2>
                            </div>
                        </div>
                        <center>
                            <select name="book[kind_id]" class="block rounded-lg border border-gray-300 bg-gray-50 text-base text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                @foreach($kinds as $kind)
                                    <option value="{{$kind->id}}">{{$kind->name}}</option>
                                @endforeach
                            </select>
                        </center>
                        <div class="py-5">
                            <p><input type="submit" class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none" value="登録"/></p>
                        </div>
                    </form>
                </div>
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
                                <form action="/myshelf/books/isbn" method="GET">
                                    @csrf
                                    <div id="stop"></div>
                                    <div id="interactive" class="viewport"></div>
                                    <div>
                                        <input id="code" name="isbn" type="text" class="rounded border border-gray-300 bg-gray-100 bg-opacity-50 mx-auto px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" placeholder="9784から始まるバーコードをスキャンしてください"/>
                                    </div>
                                    <p class="isbn__error" style="color:red">{{$errors->first('book.isbn')}}</p>
                                    <div class="py-5">
                                        <div class="mx-auto rounded-lg bg-yellow-200 shadow-xl">
                                            <h2 class="text-center text-2xl text-stone-500">本の種類</h2>
                                        </div>
                                    </div>
                                    <select name="kind_value" class="block rounded-lg border border-gray-300 bg-gray-50 text-base text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                        @foreach($kinds as $kind)
                                            <option value="{{$kind->id}}">{{$kind->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="py-5 text-center">
                                        <input type="submit" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full" value="検索"/>
                                    </div>
                                </form>
                                <div class="rounded-xl bg-yellow-100 shadow-xl py-5">
                                    <div class="back text-center">[<a class="hover:text-blue-500" href="/myshelf/users/{{Auth::user()->id}}/1">back</a>]</div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </section>
        
        
        
    </div>
</x-app-layout>
