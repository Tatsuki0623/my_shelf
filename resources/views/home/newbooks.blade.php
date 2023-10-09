<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新刊情報
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
                                    <p class="bg-yellow-100 text-xl text-black-600 font-semibold shadow-md rounded-lg mx-60">新刊を探す</p>
                                </div>
                            </div>
                            <br/>
                        <div>
                            <form action="/newbooks" method="GET">
                                @csrf
                                <div class="text-center">
                                    <div class="my-2">
                                        <div class="text-center">
                                            <h2 class="text-gray-700">楽天で検索</h2>
                                        </div>
                                        <div>
                                            <input type="text" name="title" class="shadow-lg rounded-md" placeholder="本のタイトルを入力"/>
                                        </div>
                                        <div>
                                            <input type="submit" class="bg-lime-500 hover:bg-blue-500 text-lime-100 font-bold my-2 px-4 rounded-full" value="検索"/>
                                        </div>
                                        <div>
                                            <select name="kind_value">
                                                <option value="1">漫画</option>
                                                <option value="2">小説</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>            
                            </form>
                        </div>
                    </div>
                    @if($keyword)
                        <div class="py-10">
                                <div class="bg-yellow-100 mx-24 py-5 text-center roudede-xl shadow-xl">
                                    <h3>{{$keyword}}で検索</h3>
                                </div>
                        </div>
                    @endif
                    <div class="text-center text-red-400 bg-yellow-100 mx-auto py-5">
                        <p>※「本」と検索すると全新刊情報が発売日が新しい順で検索できます</p>
                        <p>※タイトルの後ろに、　半角スペース、巻数を入れるか、タイトルの後ろに　半角スペース（巻数）を付けると探しやすいです</p>
                        <p>例）タイトル 5　タイトル (5)</p>
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
                                                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-100 py-5 my-12">
                                                        <div class="grid gap-10 mx-auto lg:grid-cols-2 lg:max-w-none">
                                                            @foreach($items as $item)
                                                                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg bg-yellow-50 text-center mx-auto">
                                                                    <a href="{{$item['itemUrl']}}" class="flex-shrink-0 text-center">
                                                                        <p class="py-5 text-xl bg-red-100 text-neutral-700 hover:text-blue-500">{{$item['title']}}</p>
                                                                    </a>
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