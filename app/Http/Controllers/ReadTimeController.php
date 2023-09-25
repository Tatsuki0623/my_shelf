<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReadTimeRequest;
use App\Models\ReadTime;


class ReadTimeController extends Controller
{
    public function store(ReadTimeRequest $request, ReadTime $read_time)
    {
        $user_id = Auth::user()->id;
        $input = $request['ReadTime'];
        $input['user_id'] = $user_id;
        
        $read_time->fill($input)->save();
        
        return redirect('/mypage/users/'.$user_id);
    }
    
    public function update(ReadTimeRequest $request, ReadTime $read_time)
    {
        $user_id = Auth::user()->id;
        
        $input = $request['ReadTime'];
        
        $read_time->fill($input)->save();
        
        return redirect('/mypage/users/'.$user_id);
    }
}
