<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Kind;
use App\Models\User;


class BookController extends Controller
{
    
    public function store(BookRequest $request, Book $book)
    {
        $user_id = Auth::user()->id;
        $input = $request['book'];
        $input['user_id'] = $user_id;
        $book->fill($input)->save();
        return redirect('/myshelf/books/users/'. $user_id. '/'. $book->id);
    }
    
    public function detail(Request $request, Book $book)
    {
        $kind_value = $request['kind_value'];
        $isbn = $request['isbn'];
        $item = $book->get_rakuten_items(kind_value: $kind_value, isbn: $isbn);
        return view('book.isbn')->with([
            'item' => $item['0'] ?? null,
            'kind_id' => $kind_value,
            ]);
    }
    
    public function show(User $user,Book $book)
    {
        return view('book.show')->with([
            'book' => $book,
            'user' => $user,
            ]);
    }
    
    public function register(Kind $kind,)
    {
        return view('book.register')->with(['kinds' => $kind->get()]);
    }
    
    public function edit(Book $book, User $user)
    {
        return view('book.edit')->with([
            'book' => $book,
            'user' => $user,
            ]);
    }
    
    public function update(BookRequest $request, Book $book)
    {
        $user_id = Auth::user()->id;
        $input = $request['book'];
        $book->fill($input)->save();
        return redirect('/myshelf/books/users/'. $user_id. '/'. $book->id);
    }
    
    public function search(Request $request, Book $book, Kind $kind)
    {
        if($request['title'])
        {
            $items = $book->get_rakuten_items(keyword: $request['title'], kind_value: $request['kind_value']);
        }elseif($request['isbn']){
            $items = $book->get_rakuten_items(isbn: $request['isbn'], kind_value: $request['kind_value']);
        }else{
            $items = null;
        }
        return view('book.search')->with([
            'items' => $items,
            'book' => $book,
            'keyword' => $request['title'],
            'kinds' => $kind->get(),
        ]);
    }
    
    public function add(Request $request, Book $book)
    {
        $user_id = Auth::user()->id;
        $kind_id = $book->kind_id;
        $item = preg_split("/&-&/",$request['item']);
        $book->link_rakuten = $item[0];
        $book->image = $item[1];
        $book->save();
        return redirect('/myshelf/users/'. $user_id. '/'. $kind_id);
    }
    
    public function delete(Book $book)
    {
        $user_id = Auth::user()->id;
        $kind_id = $book->kind_id;
        $book->delete();
        return redirect('/myshelf/users/'. $user_id. '/'. $kind_id);
    }
    
    public function preview(Request $request, Book $book)
    {
        if($request->title)
        {
            $items = $book->get_rakuten_items($request->title, $request->kind_value);
        }else{
            $items = null;
        }
        return view('home.newbooks')->with([
            'items' => $items,
            'keyword' => $request['title'],
            ]);
    }
}

