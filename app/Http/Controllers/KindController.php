<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;
use App\Models\User;

class KindController extends Controller
{
    public function show(Request $request, Kind $kind, User $user)
    {
        $split_url = str_replace(url('/myshelf/'),"",request()->fullUrl());
        $kind_id = $split_url[-1];
        
        $user_id = $user->id;
        
        return view('home.myshelf')->with([
            'user' => $user,
            'books' => $kind->getPaginateByLimit($kind_id,$user_id),
            'kind_id' => $kind_id,
            ]);
    }
    
    public function filter(Request $request, Kind $kind, User $user)
    {
        $split_url = str_replace(url('/myshelf/'),"",request()->fullUrl());
        $kind_id = $split_url[-1];
        
        $keyword = $request['title'];
        $kind_id = $request['kind_id'];
        $user_id = $user->id;
        
        return view('book.filter')->with([
            'filters' => $kind->getFilter($keyword,$kind_id,$user_id),
            'keyword' => $keyword,
            'kind_id' => $kind_id,
            'user' => $user,
            ]); 
    }
    
    public function info(Kind $kind, User $user)
    {
        $user_id = $user->id;
        return view('book.info')->with([
            'books' => $kind->getBookData($user_id),
            'user' => $user,
            ]);
    }
}
