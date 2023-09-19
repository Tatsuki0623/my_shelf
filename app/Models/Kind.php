<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Kind extends Model
{
    use HasFactory;
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    
    
    public function getPaginateByLimit($current_url)
    {
        
        
        $split_url = substr($current_url,-1,1);
        $kind_id = $split_url[-1];
        
        if ($kind_id == "1"){
            $kind = $this::find(1);
        }elseif($kind_id == "2"){
            $kind = $this::find(2);
        }else{
            return null;
        }

        $user = Auth::user()->id;
        return $kind->books()->with('kind')->where('user_id',$user)->orderBy('created_at', 'DESC')->paginate(5);
    }
    
    public function getFilter($keyword, $kind_id)
    {
        if($keyword){
            
            $kind = Kind::find($kind_id);
            $user = Auth::user()->id;
            $filter = $kind->books()->where([['user_id',$user],['title',"LIKE","%$keyword%"]])->orderBy('created_at', 'DESC')->paginate(5);
            
            return $filter;
        }else{
            
            return null;
        }
    }
    
    public function getBookData()
    {
        $user = Auth::user()->id;
        
        $register_books = Book::get()->where('user_id',$user) ?? 0;
        
        $comic = $this::find(1);
        
        $novel = $this::find(2);
        
        
        
        $all_register_books = $register_books->count() ?? 0;
        
        $comics = $comic->books()->with('kind')->where('user_id',$user)->get()->count() ?? 0;
        
        $novels = $novel->books()->with('kind')->where('user_id',$user)->get()->count() ?? 0;
        
        $total_books = $register_books->sum('volume') ?? 0;
        
        $total_comics = $comic->books()->with('kind')->where('user_id',$user)->get()->sum('volume') ?? 0;
        
        $total_novels = $novel->books()->with('kind')->where('user_id',$user)->get()->sum('volume') ?? 0;
        
        
        return $book_data = array(
                            'all_register_books' => $all_register_books,
                            'comics' => $comics,
                            'novels' => $novels,
                            'total_books' => $total_books,
                            'total_comics' => $total_comics,
                            'total_novels' => $total_novels,
                            );
    }
    
    public function getOrderByPoint()
    {
        $user = Auth::user()->id;
        $comic = $this::find(1);
        $novel = $this::find(2);
        
        $comics = $comic->books()->with('kind')->where('user_id',$user)->orderBy('point', 'DESC')->get();
        $novels = $novel->books()->with('kind')->where('user_id',$user)->orderBy('point', 'DESC')->get();
        
        return $books = array(
                '漫画' => $comics,
                '小説' => $comics,
                );;
        
    }
}