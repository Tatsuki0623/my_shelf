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
    <div id="mypage_content" class="flex flex-col">
        <center>
            <div class="text-center">
                <p id="date-day">今日は{{date('m月d日')}}</p>
                <p id="date-time"></p>
            </div>
            
            <br/>
            @if($user->id == Auth::user()->id)
                <div id="memos-content" class="basis-1/4">
                    <div class="memos-label">
                        <h2>メモ</h2>
                    </div>
                    <div id="memos-list" class="memos-list">
                    @if($memos)
                        @foreach($memos as $memo)
                            <ul class="memo_show">
                                <li>
                                    <a href="/mypage/memos/{{$memo->id}}">{{$memo->title}}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                        <div class='paginate'>
                            <p>{{$memos->links() ?? null}}</p>
                        </div>
                    @else
                        <div class="dont-have-memos">
                            <p>メモが登録されていません</p>
                            <p>メモの追加から新しく登録してください</p>
                        </div>
                    @endif
                    <div class="memos-add">
                        <a href="/mypage/memos/add">メモの追加</a>
                    </div>
            </div>
                        
                    <br/>
                    
                    <div id="read-time-content" class="basis-3/4">
                        <div id="read-time-today-content" class="read-time-today-content">
                            <div class="read-time-today-form-label">
                                <h2>今日の読書時間</h2>
                            </div>
                            <div id="read-time-today-form" class="read-time-today-form">
                            @if($read_times['today'])
                                <form action="/mypage/ReadTime/{{$read_times['today']->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="read-time-today-form-value">
                                        <input type="number" name="ReadTime[read_time]" placeholder="{{$read_times['today']->read_time}}" min="0" max="24"/>
                                        <p class="ReadTime__error" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                                    </div>
                                    <div class="read-time-today-form-value-submit">
                                        <input type="submit" value="変更"/>
                                    </div>
                                </form>
                            @else
                                <form action="/mypage/ReadTime" method="POST">
                                    @csrf
                                    <div class="read-time-today-form-value">
                                        <input type="number" name="ReadTime[read_time]" placeholder="0" min="0" max="24"/>
                                        <p class="ReadTime__error" style="color:red">{{$errors->first('ReadTime.read_time')}}</p>
                                    </div>
                                    <div class="read-time-today-form-value-submit">
                                        <input type="submit" value="追加"/>
                                    </div>
                                </form>
                            @endif
                            </div>
                        </div>
                        <div id="read-time-week-content" class="read-time-week-content">
                            <div class="read-time-week-label">
                                <h2>一週間の読書時間</h2>
                            </div>
                            <div class="read-time-week-values">
                                @if($read_times['week']->first())
                                    <div>
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
                    <div id="read-time-content" class="read-time-content">
                        <div id="read-time-week-content" class="read-time-week-content">
                            <div class="read-time-week-label">
                                <h2>一週間の読書時間</h2>
                            </div>
                            <div class="read-time-week-values">
                                @if($read_times['week']->first())
                                    <div>
                                        <canvas id="Rtime"></canvas>
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
                @endif
            
            <br/>
            
            <div id="book-point-content">
                <div>
                    <h2>本の評価</h2>
                </div>
                <div>
                    <div>
                    @foreach($books_list as $index => $book_list)  
                        <table>
                            <thead>
                                <tr>
                                    <th>点数</th>
                                    <th>{{$index}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($book_list as $index => $books)
                                    <tr>
                                        <th>{{$index}}</th>
                                        <td>
                                            @foreach($books as $book)
                                            <ul class="book-point-value">
                                                <li>
                                                <a href="myshelf/books/{{$book}}" name="{{$book->point}}">{{$book->point}}:{{$book->title}}</a>
                                            </li>
                                        </ul>
                                        @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                    </div>
                </div>
            </div>
            
            
            
            @if($user->id != Auth::user()->id)
                <div class="move-page">
                    <p><a href="/othershelf/users/{{$user->id}}/1">本棚へ</a></p>
                </div>
                <div id="favorite-select" class="favorite-select">
                    @if($user->checkFavorite($user->id))
                        <div class="un-favorite">
                            <form action="/othershelf/favorite/{{$user->id}}/detach" id="form_{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="un-favorite-button">
                                    <button type="submit">お気に入り解除</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="favorite">
                            <form action="/othershelf/favorite/{{$user->id}}/attach" method="POST" name="{{$user->name}}フォーム">
                                @csrf
                                <div class="favorite-submit">
                                    <input type="hidden" name="favorite[registered_id]" value="{{$user->id}}">
                                    <input type="submit" value="お気に入り"/>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
    </div>    
            <footer id="footer" class="fotter-container">
                <div id="go-to-top" class="go-to-top">
                    <a href="#">ページトップへ戻る</a>
                </div>
            </footer>
        </center>
</x-app-layout>