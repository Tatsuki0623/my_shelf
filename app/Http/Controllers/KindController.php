<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;

class KindController extends Controller
{
    public function show(Request $request,Kind $kind)
    {
        
        $split_url = str_replace(url('/myshelf/'),"",request()->fullUrl());
        $kind_id = $split_url[-1];
        
        $current_url = url()->current();
        $keyword = $request['title'];
        
        return view('home.myshelf')->with([
            'books' => $kind->getPaginateByLimit($current_url),
            'kind_id' => $kind_id,
            ]);
    }
    
    public function filter(Request $request, Kind $kind)
    {
        $split_url = str_replace(url('/myshelf/'),"",request()->fullUrl());
        $kind_id = $split_url[-1];
        
        $keyword = $request['title'];
        $kind_id = $request['kind_id'];
        return view('book.filter')->with([
            'filters' => $kind->getFilter($keyword,$kind_id),
            'keyword' => $keyword,
            'kind_id' => $kind_id,
            ]); 
    }
    
    public function info(Kind $kind)
    {
        return view('book.info')->with(['books' => $kind->getBookData()]);
    }
}
