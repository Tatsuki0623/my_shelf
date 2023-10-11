<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}の本棚＿本の詳細
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
    <div class="bg-green-100 py-12">
    <section class="text-gray-600 body-font relative mx-10 content-center">
        <div class="container bg-yellow-50 px-5 py-12 mx-auto rounded-2xl shadow-2xl">
            <div class="flex flex-col text-center w-full mb-12 justify-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                  {{$book->title}}の詳細画面
                </h1>
            </div>
            <div class="bg-yellow-100">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto text-center">
                        <center class="py-5">
                            <div class="item-center">
                                <img src="{{$book->image ?? "/no_image.jpg"}}"/>
                            </div>
                        </center>
                        <div class="py-5">
                            <div class="bg-yellow-200 rounded-lg mx-auto shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">本のタイトル</h2>
                            </div>
                            <div class="text-center py-5">
                                @if($book->link_rakuten)
                                    <a class="text-black hover:text-blue-500" href="{{$book->link_rakuten}}">{{$book->title}}</a>
                                @else
                                    <p class="text-black">{{$book->title}}</p>
                                @endif
                            </div>
                        </div>


                        <div class="py-5">
                            <div class="bg-yellow-200 rounded-lg mx-auto shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">感想</h2>
                            </div>
                            <div class="text-center py-5">
                                <p class="text-black">{{$book->impression}}</p>
                            </div>
                        </div>


                        <div class="py-5">
                              <div class="bg-yellow-200 rounded-lg mx-auto shadow-xl">
                                  <h2 class="text-center text-2xl text-stone-500">点数</h2>
                              </div>
                              <div class="text-center py-5">
                                  <p class="text-cyan-500">{{$book->point}}</p>
                              </div>
                        </div>

                        <div class="py-5">
                              <div class="bg-yellow-200 rounded-lg mx-auto shadow-xl">
                                  <h2 class="text-center text-2xl text-stone-500">所有巻数</h2>
                              </div>
                              <div class="text-center py-5">
                                  <p class="text-black"><span class="text-cyan-500">{{$book->volume}}</span>巻までもっています</p>
                              </div>
                        </div>

                        

                      @if($book->user_id == Auth::user()->id)
                      <div class="grid grid-cols-3">
                            <div>
                                <P>
                                    <button type="button" class="bg-transparent hover:bg-blue-400 text-black font-semibold hover:text-lime-100 py-2 px-4 border border-blue-400 hover:border-transparent rounded-lg shadow-md" onclick="location.href='/myshelf/books/{{$book->id}}/link/search'">楽天と紐づける</button>
                                </p>
                            </div>
                            <div>
                                <div>
                                    <button type="button" class="bg-transparent hover:bg-lime-400 text-black font-semibold hover:text-lime-100 py-2 px-4 border border-lime-400 hover:border-transparent rounded-lg shadow-md" onclick="location.href='/myshelf/books/{{$book->id}}/edit'">編集</button>
                                </div>
                            </div>
                            <div>
                                <form action="/myshelf/books/{{$book->id}}" id="form_{{$book->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-transparent hover:bg-red-400 text-black font-semibold hover:text-lime-100 py-2 px-4 border border-red-400 hover:border-transparent rounded-lg shadow-md" onclick="deleteBook({{$book->id}})">削除</button> 
                                </form>
                            </div>
                        </div>
                      @endif

                    </div>
                </form>
                <div class="back py-8 text-center">
                    [<a class="hover:text-blue-500" href="/mypage/users/{{$book->user_id}}">マイページへ</a>]
                    [<a class="hover:text-blue-500" href="/myshelf/users/{{$book->user_id}}/1">本棚へ</a>]
                </div>
            </div>
        </div>
    </section>
  </div>
</x-app-layout>

