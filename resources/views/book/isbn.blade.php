<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{Auth::user()->name}}の本棚＿本の登録＿確認</h2>
    </x-slot>
    <div class="bg-green-100 py-12">
        <section class="body-font relative mx-10 content-center text-gray-600">
            <div class="container mx-auto rounded-2xl bg-yellow-50 px-5 py-12 shadow-2xl">
                <div class="mb-12 flex w-full flex-col justify-center text-center">
                    <h1 class="font-mono text-2xl text-black">登録確認画面</h1>
                </div>
                <div class="bg-yellow-100">
                    <div class="mx-auto text-center md:w-2/3 lg:w-1/2">
                        @if($item)
                            <center class="py-5">
                                <div class="item-center"><img src="{{$item['largeImageUrl']}}"/></div>
                            </center>
                            <div class="py-5">
                                <div class="mx-auto rounded-lg bg-yellow-200 shadow-xl">
                                    <h2 class="text-center text-2xl text-stone-500">本のタイトル</h2>
                                </div>
                                <form action="/myshelf/books" method="POST">
                                    @csrf
                                    <div class="py-5 text-center">
                                        <a class="text-black hover:text-blue-500" href="{{$item['itemUrl']}}">{{$item['title']}}</a>
                                    </div>
                                    <input type="hidden" name="book[kind_id]" value="{{$kind_id}}"/>
                                    <input type="hidden" name="book[title]" value="{{$item['title']}}"/>
                                    <input type="hidden" name="book[image]" value="{{$item['largeImageUrl']}}"/>
                                    <input type="hidden" name="book[link_rakuten]" value="{{$item['itemUrl']}}"/>
                                    <div>
                                        <p><input type="submit" class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none" value="登録"/></p>
                                    </div>
                                </form>
                            </div>
                        @else
                        <div class="mb-12 flex w-full flex-col justify-center text-center py-5">
                            <h1 class="font-mono text-2xl text-black">検索結果がありませんでした、やり直してください</h1>
                        </div>
                        @endif
                    </div>
                    <div class="py-10 text-center">
                        <a href="javascript:history.back()" class="hover:text-blue-500">やり直す</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
