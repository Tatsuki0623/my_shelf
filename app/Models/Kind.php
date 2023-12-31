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
    
    
    
    public function getPaginateByLimit($kind_id, $user_id)
    {
        if ($kind_id == "1"){
            $kind = $this::find(1);
        }elseif($kind_id == "2"){
            $kind = $this::find(2);
        }
        
        return $kind->books()->with('kind')->where('user_id',$user_id)->orderBy('updated_at', 'DESC')->paginate(10);
    }
    
    public function getFilter($keyword, $kind_id,$user_id)
    {
        if($keyword){
            
            $kind = Kind::find($kind_id);
            $filter = $kind->books()->where([['user_id',$user_id],['title',"LIKE","%$keyword%"]])->orderBy('created_at', 'DESC')->paginate(5);
            
            return $filter;
        }else{
            
            return;
        }
    }
    
    public function getBookData($user_id)
    {
        $register_books = Book::get()->where('user_id',$user_id) ?? "0";
        $comic = $this::find(1)->books()->where('user_id',$user_id)->get();
        $novel = $this::find(2)->books()->where('user_id',$user_id)->get();
        
        $all_register_books = $register_books->count() ?? "0";
        $comics = $comic->count() ?? "0";
        $novels = $novel->count() ?? "0";
        
        $total_books = $register_books->sum('volume') ?? "0";
        $total_comics = $comic->sum('volume') ?? "0";
        $total_novels = $novel->sum('volume') ?? "0";
        
        return $book_data = array(
                            'all_register_books' => $all_register_books,
                            'comics' => $comics,
                            'novels' => $novels,
                            'total_books' => $total_books,
                            'total_comics' => $total_comics,
                            'total_novels' => $total_novels,
                            );
    }
}