<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}のマイページ_メモの追加
        </h2>
    </x-slot>
    <center>
        <div id="memo-add-content" class="memo-add-content">
            <div class="memo-add-label">
                <h1>メモの追加</h1>
            </div>
            <div id="memo-add-form" class="memo-add-from">
                <form action="/mypage/memos/{{$memo->id}}" method="POST">
                    @csrf
                    <div class="memo-title">
                        <div class="memo-title-label">
                            <h2>メモのタイトル</h2>
                        </div>
                        <div class="memo-title-value">
                            <input type="text" name="memo[title]" placeholder="本のタイトルを入力" value="{{old('memo.title')}}" size="50"/>
                            <p class="title__error" style="color:red">{{$errors->first('memo.title')}}</p>
                        </div>
                    <div class="memo-body">
                        <div class="memo-body-label">
                            <h2>メモの本文</h2>
                        </div>
                        <div class="memo-body-value">
                            <textarea name="memo[body]" rows="6" cols="40" placeholder="600文字以下で入力してください">{{old('memo.body')}}</textarea>
                            <p class="body__error" style="color:red">{{$errors->first('memo.body')}}</p>
                        </div>
                    </div>
                    <div class="memo-value-submit">
                        <p><input type="submit" value="追加"/></p>
                    </div>
                </form>
            </div>
            <div class="back">[<a href="javascript:history.back()">back</a>]</div>
        </div>
    </center>
</x-app-layout>