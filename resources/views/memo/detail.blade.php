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
    <center>
        <div id="memo_{{$memo->id}}-content" class="memo-content">
            <div class="memo-title-value">
                <h2>
                    {{$memo->title}}
                </h2>
            </div>
            <div class="memo-body-value">
                <div id="memo-body-value-label" class="memo-body-value-label">
                    <h3>本文</h3>
                </div>
                <div class="memo-body-value">
                    <p>{{$memo->body}}</p>
                </div>
            </div>
        </div>
        
        <div id="memo-delete-value" class="memo-delete-value">
            <form action="/mypage/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                @csrf
                @method('DELETE')
                <div class="memo-delete-button">
                    <button type="button" onclick="deleteMemo({{$memo->id}})">削除</button> 
                </div>
            </form>
        </div>
        
        <div class="edit">
            <a href="/mypage/memos/{{$memo->id}}/edit">edit</a>
        </div>
        <div class="back">[<a href="/mypage/users/{{Auth::user()->id}}">back</a>]</div>
    </center>
</x-app-layout>