

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}の本棚＿本の登録
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="bg-green-100 py-12">
    <section class="text-gray-600 body-font relative mx-10 content-center">
        <div class="container bg-yellow-50 px-5 py-12 mx-auto rounded-2xl shadow-2xl">
            <div class="flex flex-col text-center w-full mb-12 justify-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                  本の登録
                </h1>
            </div>
            <div class="bg-yellow-100">
                <form action="/myshelf/books" method="POST">
                    @csrf 
                    <div class="lg:w-1/2 md:w-2/3 mx-auto ">
                        <div class="py-5">
                            <div class="bg-yellow-200 rounded-lg mx-56 shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">本のタイトル</h2>
                            </div>
                            <div class="text-center py-5">
                                <input type="text" 
                                       name="book[title]"
                                       class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                       placeholder="本のタイトルを入力" 
                                       value="{{old('book.title')}}" 
                                       size="50"/>
                                <p class="title__error" style="color:red">{{$errors->first('book.title')}}</p>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="bg-yellow-200 rounded-lg mx-56 shadow-xl">
                            <h2 class="text-center text-2xl text-stone-500 my-5">本の種類</h2>
                        </div>
                        <select name='book[kind_id]' class="block text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($kinds as $kind)
                                <option class="" value="{{$kind->id}}">{{$kind->name}}</option>
                            @endforeach
                        </select>
                    </center>
                    <div class="py-5">
                        <p><input type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto" value="登録"/></p>
                    </div>
                  </form>
                <div class="back py-8 text-center">
                  [<a class="hover:text-blue-500" href="/myshelf/users/{{Auth::user()->id}}/1">back</a>]
                </div>
            </div>
        </div>
    </section>
  </div>
</x-app-layout>