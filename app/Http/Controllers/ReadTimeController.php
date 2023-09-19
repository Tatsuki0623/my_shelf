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
        $input = $request['ReadTime'];
        $input['user_id'] = Auth::user()->id;
        $read_time->fill($input)->save();
        return redirect('/mypage');
    }
    public function update(ReadTimeRequest $request, ReadTime $read_time)
    {
        $input = $request['ReadTime'];
        $read_time->fill($input)->save();
        return redirect('/mypage');
    }
}
