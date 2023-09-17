<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use RakutenRws_Client;
use App\Models\Book;
use App\Models\Kind;


class BookController extends Controller
{
    public function get_rakuten_items($keyword)
    {
        $client = new RakutenRws_Client();
        
        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_application_id'));
        
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        
        $response = $client->execute('BooksTotalSearch', array(
            'keyword' => $keyword,
            'hits' =>10,
        ));
        
        $items = array();
        
        if(!$response->isOk()){
            return $items[] = 'Error:'.$response->getMessage();
        } else {
            foreach($response as $key){
                $items[] = $key;
                }
            return $items;
            }
    }
    
    public function store(BookRequest $request, Book $book)
    {
        $input = $request['book'];
        $input['user_id'] = Auth::user()->id;
        $book->fill($input)->save();
        return redirect('/myshelf/books/' . $book->id);
    }
    
    public function show(Book $book)
    {
        return view('book.show')->with(['book' => $book]);
    }
    
    public function register(Kind $kind)
    {
        return view('book.register')->with(['kinds' => $kind->get()]);
    }
    
    public function edit(Book $book)
    {
        return view('book.edit')->with(['book' => $book]);
    }
    
    public function update(BookRequest $request, Book $book)
    {
        $input = $request['book'];
        $book->fill($input)->save();
        return redirect('/myshelf/books/' . $book->id);
    }
    
    public function search(Request $request, Book $book)
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
        ]);
    }
    
    public function add(Request $request, Book $book)
    {
        $item = preg_split("/&-&/",$request['item']);
        $book->link_rakuten = $item[0];
        $book->image = $item[1];
        $book->save();
        return redirect('/myshelf/books/'. $book->id);
    }
    
    public function delete(Book $book)
    {
        $kind_id = $book->kind_id;
        $book->delete();
        return redirect('/myshelf/' .$kind_id);
    }
}

