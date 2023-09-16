<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;

class KindController extends Controller
{
    public function show(Request $request,Kind $kind)
    {
        $current_url = url(\Route::current()->uri());
        
        return view('book.info')->with(['books' => $kind->getPaginateByLimit($current_url)]);
    }
}
