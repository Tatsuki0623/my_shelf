<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemoRequest;
use App\Models\Memo;
use App\Models\Kind;
use App\Models\ReadTime;
use App\Models\User;

class MemoController extends Controller
{
    public function show(Memo $memo, Kind $kind, ReadTime $read_time, User $user)
    {
        return view('home.mypage')->with([
            'memos' => $memo->getPaginateByLimit($user),
            'book_list' => $kind->getBookPoint($user),
            'read_times' => $read_time->getReadTimes($user),
            'user' => $user,
            ]);
    }
    
    public function detail(Memo $memo)
    {
        return view('memo.detail')->with(['memo' => $memo]);
    }
    
    public function add(Memo $memo)
    {
        return view('memo.add')->with(['memo' => $memo]);
    }
    
    public function store(MemoRequest $request, Memo $memo)
    {
        $input = $request['memo'];
        $input['user_id'] = Auth::user()->id;
        $memo->fill($input)->save();
        return redirect('/mypage/memos/' . $memo->id);
    }
    
    public function edit(Memo $memo)
    {
        return view('memo.edit')->with(['memo' => $memo]);
    }
    
    public function update(MemoRequest $request, Memo $memo)
    {
        $input = $request['memo'];
        $memo->fill($input)->save();
        return redirect('/mypage/memos/' . $memo->id);
    }
    
    public function delete(Memo $memo)
    {
        $memo->delete();
        return redirect('/mypage/users/'. $memo->user_id);
    }
}
