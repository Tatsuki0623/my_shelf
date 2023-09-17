<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;

class KindController extends Controller
{
    public function show(Request $request,Kind $kind)
    {
        $current_url = url()->current();
        $keyword = $request['title'];
        
        return view('home.myshelf')->with(['books' => $kind->getPaginateByLimit($current_url)]);
    }
    
    public function Cfilter(Request $request, Kind $kind)
    {
        $keyword = $request['title'];
        
        return view('book.filter')->with([
            'filters' => $kind->getFilterCommic($keyword),
            'keyword' => $keyword,
            ]);
    }
    
    public function Nfilter(Request $request, Kind $kind)
    {
        $keyword = $request['title'];
        
        return view('book.filter')->with([
            'filters' => $kind->getFilterNovel($keyword),
            'keyword' => $keyword,
            ]);
    }
}
