

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}の本棚＿本の編集
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="bg-green-100 py-12">
    <section class="text-gray-600 body-font relative mx-10 content-center">
        <div class="container bg-yellow-50 px-5 py-12 mx-auto rounded-2xl shadow-2xl">
            <div class="flex flex-col text-center w-full mb-12 justify-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                  {{$book->title}}
                  の編集画面
                </h1>
            </div>
            <div class="bg-yellow-100">
                <form action="/myshelf/books/{{$book->id}}" method="POST">
                    @csrf 
                    @method('PUT')
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
                                       value="{{$book->title}}" 
                                       size="50" />
                                <p class="title__error mt-2 text-red-400">{{$errors->first('book.title')}}</p>
                            </div>
                        </div>


                        <div class="py-5">
                            <div class="bg-yellow-200 rounded-lg mx-56 shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">本の感想</h2>
                            </div>
                            <div class="text-center py-5">
                                <textarea name="book[impression]"
                                          class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                          placeholder="600文字以下で入力してください"
                                          rows="8" 
                                          cols="70" >{{$book->impression}}</textarea>
                                <p class="impression__error mt-2 text-red-400">{{$errors->first('book.impression')}}</p>
                            </div>
                        </div>


                        <div class="py-5">
                              <div class="bg-yellow-200 rounded-lg mx-56 shadow-xl">
                                  <h2 class="text-center text-2xl text-stone-500">点数</h2>
                              </div>
                              <div class="text-center py-5">
                                  <input type="number" 
                                  name="book[point]"
                                  class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                  placeholder="100点満点で入力" 
                                  value="{{$book->point}}" />
                                  <p class="point__error mt-2 text-red-400">{{$errors->first('book.point')}}</p>
                              </div>
                        </div>

                        <div class="py-5">
                              <div class="bg-yellow-200 rounded-lg mx-56 shadow-xl">
                                  <h2 class="text-center text-2xl text-stone-500">所有巻数</h2>
                              </div>
                              <div class="text-center py-5">
                                  <input type="number"
                                         name="book[volume]"
                                         class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                         placeholder="何巻までもってる？" 
                                         value="{{$book->volume}}" />
                                  <p class="volume__error mt-2 text-red-400">{{$errors->first('book.volume')}}</p>
                              </div>
                        </div>

                    </div>
                    <div class="py-5">
                        <p><input type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto" value="保存"/></p>
                    </div>
                </form>
                <div class="back py-8 text-center hover:text-blue-500">[<a href="javascript:history.back()">back</a>]</div>
            </div>
        </div>
    </section>
  </div>

</x-app-layout>

