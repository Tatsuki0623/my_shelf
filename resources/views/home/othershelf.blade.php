<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('みんなの本棚') }}
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="bg-red-200">
        <section class="body-font py-9 text-gray-600">
            <div class="container mx-auto rounded-xl bg-yellow-200 px-5 py-24 shadow-xl">
                <div class="mx-auto w-full text-center lg:w-3/4 xl:w-1/2">
                    <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">本棚の公開</h1>
                    <span class="mb-6 mt-8 inline-block h-1 w-10 rounded bg-indigo-500"></span>
                    <div>
                        @if(Auth::user()->public)
                            <form action="/othershelf/favorite/{{Auth::user()->id}}/public" method="POST">
                                <div class="py-5">
                                    <h2 class="title-font text-sm font-medium tracking-wider text-gray-900">公開中</h2>
                                    <p class="text-gray-500">以下のボタンから非公開に変えられます</p>
                                </div>
                                @csrf @method('PUT')
                                    <div class="py-5">
                                        <input type="hidden" name="user[public]" value="0" />
                                        <input class="rounded-lg border border-red-400 bg-transparent px-4 py-2 font-semibold text-blue-300 shadow-md hover:border-transparent hover:bg-red-400 hover:text-lime-100" type="submit" value="非公開" />
                                    </div>
                            </form>
                        @else
                            <form action="/othershelf/favorite/{{Auth::user()->id}}/public" method="POST">
                                <div class="py-5">
                                    <h2 class="title-font text-sm font-medium tracking-wider text-gray-900">非公開中</h2>
                                    <p class="text-gray-500">以下のボタンから自分の本棚を公開してみよう！</p>
                                </div>
                                @csrf @method('PUT')
                                    <div>
                                        <input type="hidden" name="user[public]" value="1" />
                                        <input class="rounded-lg border border-lime-500 bg-transparent px-4 py-2 font-semibold text-blue-300 shadow-md hover:border-transparent hover:bg-blue-500 hover:text-lime-100" type="submit" value="公開" />
                                    </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="body-font py-10 text-gray-600">
            <div class="container mx-auto rounded-xl bg-yellow-200 px-5 py-24 shadow-xl">
                <div class="mb-20 flex w-full flex-col text-center">
                    <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">公開中のユーザー</h1>
                    <p class="mx-auto text-base leading-relaxed lg:w-2/3">あなたに素敵な出会いを</p>
                </div>
                <div class="-m-2 flex flex-wrap">

                @foreach($users as $user)
                    @if(!$check->checkFavorite($user->id))
                        <div class="w-full p-2 md:w-1/2 lg:w-1/3">
                            <div class="flex h-full items-center rounded-lg border border-blue-500 p-4">
                                <div class="flex-grow">
                                    <h2 class="title-font font-medium text-gray-900">{{$user->name}}</h2>
                                    <div class="text-center">
                                        <form action="/othershelf/favorite/{{$user->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                            @csrf
                                            <p>
                                                <a class="hover:text-blue-500" href="/othershelf/users/{{$user->id}}/1">本棚へ　　　　　</a>
                                                <a class="hover:text-blue-500" href="/mypage/users/{{$user->id}}">マイページへ</a>
                                            </p>
                                            <div class="py-2">
                                                <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}" />
                                                <input type="submit" class="rounded-lg border border-blue-500 bg-transparent px-4 py-2 font-semibold text-blue-300 shadow-md hover:border-transparent hover:bg-blue-500 hover:text-lime-100" value="お気に入り" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
                @if($users->links()->elements['1'] ?? null)
                    <div class="pt-5">
                        <div class='paginate pt-5 bg-yellow-100'>
                            {{$users->onEachSide(3)->links()}}
                        </div>
                    </div>
                @endif
            </div>
        </section>
        
        <section class="body-font py-10 text-gray-600">
            <div class="container mx-auto rounded-xl bg-yellow-200 px-5 py-24 shadow-xl">
                <div class="mb-20 flex w-full flex-col text-center">
                    <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">お気に入りユーザー</h1>
                    <p class="mx-auto text-base leading-relaxed lg:w-2/3">あなたの好きを増やそう！</p>
                </div>
                <div class="-m-2 flex flex-wrap py-5">
                    @if($favorited_users)
                        @foreach($favorited_users as $user)
                            <div class="w-full p-2 md:w-1/2 lg:w-1/3">
                                <div class="flex h-full items-center rounded-lg border border-lime-500 p-4">
                                    <div class="flex-grow">
                                        <h2 class="title-font font-medium text-gray-900">{{$user->name}}</h2>
                                        <div class="text-center">
                                            @if($check->checkFavorite($user->id))
                                                <form action="/othershelf/favorite/{{$user->id}}/detach" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>
                                                        <a class="hover:text-blue-500" href="/othershelf/users/{{$user->id}}/1">本棚へ　　　　　</a>
                                                        <a class="hover:text-blue-500" href="/mypage/users/{{$user->id}}">マイページへ</a>
                                                    </p>
                                                    <div class="py-2">
                                                        <button type="submit" class="rounded-lg border border-red-400 bg-transparent px-4 py-2 font-semibold text-blue-300 shadow-md hover:border-transparent hover:bg-red-400 hover:text-lime-100">お気に入り解除</button>
                                                    </div>
                                            @else
                                                <form action="/othershelf/favorite/{{$user->pivot->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                                    @csrf
                                                    <p>
                                                        <a class="hover:text-blue-500" href="/othershelf/users/{{$user->id}}/1">本棚へ　　　　　</a>
                                                        <a class="hover:text-blue-500" href="/mypage/users/{{$user->id}}">マイページへ</a>
                                                    </p>
                                                    <div class="py-2">
                                                        <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}" />
                                                        <input type="submit" class="rounded-lg border border-blue-500 bg-transparent px-4 py-2 font-semibold text-blue-300 shadow-md hover:border-transparent hover:bg-blue-500 hover:text-lime-100" value="お気に入り" />
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                        @endforeach
                        
                        @if($favorited_users->links()->elements['1'] ?? null)
                            <div class="pt-5">
                                <div class='paginate pt-5 bg-yellow-100'>
                                    {{$favorited_users->onEachSide(3)->links()}}
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-yellow-100 rounded-xl shadow-xl mx-auto py-3 text-center text-red-400">
                            <p>お気に入りユーザーは登録されていません</p>
                        </div>
                    @endif
            </div>
        </section>
        
        
    </div>
</x-app-layout>