<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use RakutenRws_Client;
use App\Models\Book;
use App\Models\Kind;
use App\Models\User;


class BookController extends Controller
{
    public function get_rakuten_items($keyword)
    {
        $client = new RakutenRws_Client();
        
        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_application_id'));
        
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        
        $responses = $client->execute('BooksTotalSearch', array(
            'keyword' => $keyword,
            'hits' =>10,
        ));
        
        $items = array();
        
        if(!$responses->isOk()){
            return $items[] = 'Error:'.$response->getMessage();
        } else {
            foreach($responses as $response){
                $items[] = $response;
                }
            return $items;
            }
    }
    
    //myshelf
    public function store(BookRequest $request, Book $book)
    {
        $user_id = Auth::user()->id;
        $input = $request['book'];
        $input['user_id'] = $user_id;
        $book->fill($input)->save();
        return redirect('/myshelf/books/users/'. $user_id. '/'. $book->id);
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
    
    public function search(Request $request, Book $book, User $user)
    {
        if($request->title)
        {
            $items = $this->get_rakuten_items($request->title);
        }else{
            $items = null;
        }
        return view('book.search')->with([
            'items' => $items,
            'book' => $book,
            'user' => $user,
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
    
    //newbooks
    public function preview(Request $request)
    {
        if($request->title)
        {
            $items = $this->get_rakuten_items($request->title);
        }else{
            $items = null;
        }
        return view('home.newbooks')->with([
            'items' => $items,
            'keyword' => $request['title'],
            ]);
    }
}

