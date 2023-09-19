<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemoRequest;
use App\Models\Memo;
use App\Models\Kind;
use App\Models\ReadTime;

class MemoController extends Controller
{
    public function show(Memo $memo, Kind $kind, ReadTime $read_time)
    {
        $read_times = array(
                    'today' => $read_time->getTodayReadTime(),
                    'week' => $read_time->getWeekReadTime(),
                    );
                    
        return view('home.mypage')->with([
            'memos' => $memo->getPaginateByLimit(),
            'book_list' => $kind->getOrderByPoint(),
            'read_times' => $read_times,
            ]);
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
    
    public function delete(Memo $memo)
    {
        $memo->delete();
        return redirect('/mypage');
    }
}
