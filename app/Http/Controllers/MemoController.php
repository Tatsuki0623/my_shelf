<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemoRequest;
use App\Models\Memo;

class MemoController extends Controller
{
    public function show(Memo $memo)
    {
        return view('home.mypage')->with(['memos' => $memo->getPaginateByLimit()]);
    }
    
    public function detail(Memo $memo)
    {
        return view('memo.detail')->with(['memo' => $memo]);
    }
    
    public function add(Memo $memo)
    {
        return view('memo.add')->with(['memos' => $memo->get()]);
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
}
