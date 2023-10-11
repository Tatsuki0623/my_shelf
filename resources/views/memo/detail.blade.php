<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}のマイページ_メモの詳細
        </h2>
        <script>
            function deleteMemo(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-slot>
        <section class="text-gray-600 body-font relative mx-10 my-24 content-center">
            <div class="container bg-lime-100 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
                <div class="flex flex-col text-center w-full mb-12 justify-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                        メモの詳細
                    </h1>
                </div>
            <div class="bg-yellow-50">
                <div class="lg:w-1/2 md:w-2/3 mx-auto ">
                    <div class="py-5 text-center">
                        <div class="py-5">
                            <div class="bg-yellow-100 rounded-lg mx-auto shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">メモのタイトル</h2>
                            </div>
                            <h2 class="text-center text-2xl text-gray-700 py-5">{{$memo->title}}</h2>
                            <div class="py-5">
                                <div class="bg-yellow-100 rounded-lg mx-auto shadow-xl">
                                    <h2 class="text-center text-2xl text-stone-500">メモの本文</h2>
                                </div>
                                 <div>
                                     <p class="text-center text-2xl text-gray-700 mx-auto py-5">{{$memo->body}}</p>
                                 </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="text-center grid grid-cols-2 py-5">
                        <div id="memo-delete-value" class="memo-delete-value">
                            <form action="/mypage/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="memo-delete-button">
                                    <button type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto" onclick="deleteMemo({{$memo->id}})">削除</button> 
                                </div>
                            </form>
                        </div>
                        <div>
                            <div class="edit">
                                <button onclick="location.href='/mypage/memos/{{$memo->id}}/edit'" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto">edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="back text-center hover:text-blue-500">[<a href="/mypage/users/{{Auth::user()->id}}">back</a>]</div>
                </div>
            </div>
            </div>
        </section>
</x-app-layout>