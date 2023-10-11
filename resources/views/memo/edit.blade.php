<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}のマイページ_メモの編集
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font relative mx-10 my-24 content-center">
        <div class="container bg-lime-100 px-5 py-24 mx-auto rounded-2xl shadow-2xl">
            <div class="flex flex-col text-center w-full mb-12 justify-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                  メモの編集
                </h1>
            </div>
            <div class="bg-yellow-50">
                <form action="/mypage/memos/{{$memo->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="lg:w-1/2 md:w-2/3 mx-auto ">
                        <div class="py-5">
                            <div class="bg-yellow-100 rounded-lg mx-auto shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">メモのタイトル</h2>
                            </div>
                            <div class="memo-title-value text-center py-5">
                                <input type="text" 
                                       name="memo[title]" 
                                       class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                       placeholder="本のタイトルを入力" 
                                       value="{{$memo->title}}"/>
                                <p class="title__error mt-2 text-red-400" style="color:red">{{$errors->first('memo.title')}}</p>
                            </div>
                            </div>
    
    
                            <div class="py-5">
                            <div class="bg-yellow-100 rounded-lg mx-auto shadow-xl">
                                <h2 class="text-center text-2xl text-stone-500">メモの本文</h2>
                            </div>
                            <div class="memo-body-value text-center py-5">
                                <textarea name="memo[body]" 
                                          rows="8" 
                                          class="w-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" 
                                          placeholder="600文字以下で入力してください">{{$memo->body}}</textarea>
                                <p class="body__error mt-2 text-red-400">{{$errors->first('memo.body')}}</p>
                            </div>
                            </div>
                            <div class="memo-value-submit py-5">
                            <p><input type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-auto" value="保存"/></p>
                        </div>
                    </div>
                </form>
                <div class="back py-8 text-center hover:text-blue-500">[<a href="javascript:history.back()">back</a>]</div>
            </div>
        </div>
</x-app-layout>

