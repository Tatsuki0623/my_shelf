<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}のマイページ＿メモの編集
        </h2>
    </x-slot>
<center>
    <div id="memo-edit-content" class="memo-edit-content">
        <div class="memo-edit-label">
            <h1>メモの編集</h1>
        </div>
        <div id="memo-edit-form" class="memo-edit-from">
            <form action="/mypage/memos/{{$memo->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="memo-title">
                    <div class="memo-title-label">
                        <h2>メモのタイトル</h2>
                    </div>
                    <div class="memo-title-value">
                        <input type="text" name="memo[title]" placeholder="本のタイトルを入力" value="{{$memo->title}}" size="50"/>
                        <p class="title__error" style="color:red">{{$errors->first('memo.title')}}</p>
                    </div>
                </div>
                <div class="memo-body">
                    <div class="memo-body-label">
                        <h2>メモの本文</h2>
                    </div>
                    <div class="memo-body-value">
                        <textarea name="memo[body]" rows="6" cols="40">{{$memo->body}}</textarea>
                        <p class="body__error" style="color:red">{{$errors->first('memo.body')}}</p>
                    </div>
                </div>
                <div class="memo-value-submit">
                    <p><input type="submit" value="保存"/></p>
                </div>
            </form>
        </div>
    </div>
    <div class="back">[<a href="/mypage/users/{{$memo->user_id}}">back</a>]</div>
    </center>
</x-app-layout>
