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
        
        return $kind->books()->with('kind')->where('user_id',$user_id)->orderBy('created_at', 'DESC')->paginate(5);
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
        $comic = $this::find(1);
        $novel = $this::find(2);
        
        $all_register_books = $register_books->count() ?? "0";
        $comics = $comic->books()->with('kind')->where('user_id',$user_id)->get()->count() ?? "0";
        $novels = $novel->books()->with('kind')->where('user_id',$user_id)->get()->count() ?? "0";
        
        $total_books = $register_books->sum('volume') ?? "0";
        $total_comics = $comic->books()->with('kind')->where('user_id',$user_id)->get()->sum('volume') ?? "0";
        $total_novels = $novel->books()->with('kind')->where('user_id',$user_id)->get()->sum('volume') ?? "0";
        
        return $book_data = array(
                            'all_register_books' => $all_register_books,
                            'comics' => $comics,
                            'novels' => $novels,
                            'total_books' => $total_books,
                            'total_comics' => $total_comics,
                            'total_novels' => $total_novels,
                            );
    }
    
    public function getBookPoint($user){
        $user_id = $user->id;
        for($kind_id = 1; $kind_id < 3; $kind_id++){
            $kind = $this::find($kind_id);
            $books = $kind->books()->where('user_id',$user_id)->get();
            dd($books);
            $point100 = [];
            $point90 = [];
            $point80 = [];
            $point70 = [];
            $point60 = [];
            $point50 = [];
            $point40 = [];
            $point30 = [];
            $point20 = [];
            $point10 = [];
            $point0 = [];
            
            foreach($books as $book){
                switch($book->point){
                    case 100;
                        array_push($point100,$book);
                        break;
                    
                    case $book->point < 100 && $book->point >= 90;
                        array_push($point90,$book);
                        break;
                    
                    case $book->point < 90 && $book->point >= 80;
                        array_push($point80,$book);
                        break;
                    
                    case $book->point < 80 && $book->point >= 70;
                        array_push($point70,$book);
                        break;
                    
                    case $book->point < 70 && $book->point >= 60;
                        array_push($point60,$book);
                        break;
                    
                    case $book->point < 60 && $book->point >= 50;
                        array_push($point50,$book);
                        break;
                    
                    case $book->point < 50 && $book->point >= 40;
                        array_push($point40,$book);
                        break;
                    
                    case $book->point < 40 && $book->point >= 30;
                        array_push($point30,$book);
                        break;
                    
                    case $book->point < 30 && $book->point >= 20;
                        array_push($point20,$book);
                        break;
                        
                    case $book->point < 20 && $book->point >=10;
                        array_push($point10,$book);
                        break;
                        
                    case $book->point < 10 && $book->point >=0;
                        array_push($point0,$book);
                        break;
                }
            }
            dd($point100);
            if($kind_id = 1){
                $comics = array(
                '100' => $point100,
                '90' => $point90,
                '80' => $point80,
                '70' => $point70,
                '60' => $point60,
                '50' => $point50,
                '40' => $point40,
                '30' => $point30,
                '20' => $point20,
                '10' => $point10,
                '0' => $point0,
                );
            }else{
                $novels = array(
                '100' => $point100,
                '90' => $point90,
                '80' => $point80,
                '70' => $point70,
                '60' => $point60,
                '50' => $point50,
                '40' => $point40,
                '30' => $point30,
                '20' => $point20,
                '10' => $point10,
                '0' => $point0,
                );
            }
        }
        dd($books_point);
        
        return $books_point = array(
            '漫画' => $books,
            '小説' => $novels,
            );
    }
}