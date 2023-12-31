<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}のマイページ
        </h2>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            var read_times_data = @json($read_times['week']);
        </script>
    </x-slot>
    <div class="relative min-h-screen pt-12 shadow-xl bg-lime-100 rounded-lg">
            <div class="relative bg-yellow-50 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl text-center py-5">
                <p class="text-blue-500 font-bold">今日は{{date('m月d日')}}</p>
                <p id="date-time" class="text-blue-500 font-bold"></p>
            </div>
            
            <br/>
            @if($user->id == Auth::user()->id)
                <div class="relative bg-yellow-50 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl text-center pt-5">
                    <div class="bg-yellow-100 rounded-lg mx-auto shadow-xl">
                        <p class="text-center text-3xl text-stone-500">メモ</p>
                    </div>
                    <div class="flex-1 mx-10 pt-7">
                    @if($memos)
                        @foreach($memos as $memo)
                            <ul class="box-content py-5 rounded-lg bg-yellow-100">
                                <li class="bg-lime-200 border-4 border-lime-100 mx-28 text-center rounded-lg">
                                    <a href="/mypage/memos/{{$memo->id}}">{{$memo->title}}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                        <div class='paginate leading-10 text-center'>
                            <p>{{$memos->onEachSide(3)->links()}}</p>
                        </div>
                    @else
                        <div class="text-red-400 text-center">
                            <p>メモが登録されていません</p>
                            <p>メモの追加から新しく登録してください</p>
                        </div>
                    @endif
                        <div class="leading-10 text-center py-5">
                            <button class="px-4 py-2 font-semibold text-sm bg-lime-200 text-slate-500 rounded-md shadow-sm hover:scale-110 ease-in-out duration-300 delay-150" onclick="location.href='/mypage/memos/add'">メモの追加</button>
                        </div>
                </div>
                        
                <br/>
                    
                <div id="read-time-content" class="flex-1 space-y-16 relative bg-yellow-50 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl">
                    <div class="relative  flex-1 space-y-5 bg-yellow-100 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl">
                        <div class="flex-1">
                            <div class="bg-yellow-50 w-25 h-12 ring-1 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                                <h2>今日の読書時間</h2>
                            </div>
                            <div class="text-center pt-5">
                            @if($read_times['today'])
                                <form action="/mypage/ReadTime/{{$read_times['today']->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="read-time-today-form-value pt-3">
                                        <input type="number" name="ReadTime[read_time]" class="outline-2 outline-blue-500/50 bg-neutral-100 border-2 border-cyan-100" placeholder="{{$read_times['today']->read_time}}" min="0" max="24"/>
                                        <p class="ReadTime__error" style="color:red">{{$errors->first('Readtime.read_time')}}</p>
                                    </div>
                                    <div class="ReadTime__error text-red-400 pt-3">
                                        <input type="submit" class="px-4 py-1 font-semibold text-sm bg-lime-200 text-slate-500 rounded-md shadow-sm hover:scale-110 ease-in-out duration-300 delay-150" value="変更"/>
                                    </div>
                                </form>
                            @else
                                <form action="/mypage/ReadTime" method="POST">
                                    @csrf
                                    <div class="read-time-today-form-value pt-3">
                                        <input type="number" name="ReadTime[read_time]" class="outline-2 outline-blue-500/50 bg-neutral-100 border-2 border-cyan-100" placeholder="0" min="0" max="24"/>
                                        <p class="ReadTime__error text-red-400" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                                    </div>
                                    <div class="read-time-today-form-value-submit pt-3">
                                        <input type="submit" class="px-4 py-1 font-semibold text-sm bg-lime-200 text-slate-500 rounded-md shadow-sm hover:scale-110 ease-in-out duration-300 delay-150" value="追加"/>
                                    </div>
                                </form>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="relative flex-1 space-y-5 bg-yellow-100 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl text-center">
                        <div class="bg-yellow-50 w-25 h-12 ring-1 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                            <h2>一週間の読書時間</h2>
                        </div>
                        <div class="flex-1 space-y-5 text-center">
                            @if($read_times['week']->first())
                                <div class="relative bg-yellow-50 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                                    <canvas id="Rtime"></canvas>
                                    <script>
                                        var read_times_data = @json($read_times['week']);
                                    </script>
                                </div>
                                <div class='paginate'>
                                    {{$read_times['week']->links() ?? null}}
                                </div> 
                            @else
                                <div class="dont-have-read-time">
                                    <p>読書時間が登録されていません</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div id="read-time-content" class="flex-1 space-y-16 relative bg-yellow-50 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl">
                    <div class="relative flex-1 space-y-5 bg-yellow-100 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 drop-shadow-xl text-center">
                        <div class="bg-yellow-50 w-25 h-12 ring-1 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                            <h2>一週間の読書時間</h2>
                        </div>
                        <div class="flex-1 space-y-5 text-center">
                            @if($read_times['week']->first())
                                <div class="relative bg-yellow-50 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                                    <canvas id="Rtime"></canvas>
                                </div>
                                <div class='paginate leading-10'>
                                    {{$read_times['week']->onEachSide(3)->links()}}
                                </div> 
                            @else
                                <div>
                                    <p class="text-red-400">読書時間が登録されていません</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            <br/>
            <div id="book-point-content" class="flex-1 space-y-16 relative bg-yellow-50 px-6 py-10 shadow-xl ring-1 ring-gray-100/5 mx-16 drop-shadow-xl rounded-xl text-center">
              <div class="relative  flex-1 space-y-5 bg-yellow-100 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-100/5 drop-shadow-xl rounded-xl">
                <div class="bg-yellow-50 w-25 h-12 ring-1 ring-gray-100 sm:mx-auto sm:max-w-lg sm:rounded-lg drop-shadow-xl">
                    <h2>本の評価</h2>
                </div>
                    @foreach($books_list as $index => $book_list)
                        <div class="py-5">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-700 bg-cyan-100">点数</th>
                                        <th class="border border-gray-700 bg-cyan-100">{{$index}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($book_list as $index => $books)
                                        <tr>
                                            <th class="border border-gray-700 bg-cyan-100 pl-0 py-2">{{$index}}</th>
                                            <td class="border border-gray-700 bg-cyan-100">
                                                <ul>
                                                    <li>
                                                        @foreach($books as $book)
                                                            <a class="hover:text-lime-500" href="/myshelf/books/users/{{$user->id}}/{{$book->id}}" name="{{$book->point}}">{{$book->point}}:{{$book->title}}　</a>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
            
            @if($user->id != Auth::user()->id)
                <section>
                    <div class="relative px-4 py-10 sm:px-6 lg:py-16 lg:px-8">
                        <div class="relative  mx-auto max-w-2xl">
                            <div class="mx-auto rounded-md shadow-lg bg-yellow-50">
                                <div class="text-center pt-4 mx-auto">
                                    <div class="relative px-5 py-10 sm:px-6 lg:py-16 lg:px-8">
                                        <div class="relative mx-auto max-w-2xl">
                                            <div class="py-5">
                                                <a class="text-black hover:text-blue-500" href="/myshelf/users/{{$user->id}}/1">{{$user->name}}の本棚へ</a>
                                            </div>
                                            @if($user->checkFavorite($user->id))
                                                <div>
                                                    <form action="/othershelf/favorite/{{$user->id}}/detach" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-transparent hover:bg-red-400 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-red-400 hover:border-transparent rounded-lg shadow-md">お気に入り解除</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div>
                                                    <form action="/othershelf/favorite/{{$user->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                                        @csrf
                                                        <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}">
                                                        <input type="submit" class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-lime-100 py-2 px-4 border border-lime-500 hover:border-transparent rounded-lg shadow-md" value="お気に入り"/>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            
            <footer id="footer" class="text-center bg-lime-200 rounded-lg">
                <div id="go-to-top" class="go-to-top py-10">
                    <a class="hover:text-blue-500" href="#">ページトップへ戻る</a>
                </div>
            </footer>
        </div>
</x-app-layout>