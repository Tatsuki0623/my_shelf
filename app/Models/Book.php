<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'volume',
        'impression',
        'point',
        'image',
        'link_rakuten',
        'kind_id',
        'user_id'
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }
    
    
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        $user = Auth::user()->id;
        
        return $this->where('user_id',$user)->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    public function getBookPoint($user){
        $user_id = $user->id;
        
        $book_list = [];
        $pointGroups = [];
        $books_point = $this::where('user_id', $user_id)->get();
        
            for($kind_id = 1; $kind_id < 3; $kind_id++){
                $pointGroups['100'] = $books_point->where('point', 100)->where('kind_id',$kind_id);
                
                for ($point = 99; $point >= 0; $point -= 10) {
                    $endPoint = $point - 9;
                    $points = $books_point->whereBetween('point', [$endPoint, $point])->where('kind_id', $kind_id);
                    $key = (int)$endPoint;
                    $pointGroups["$key"] = $points;
                }
            
                if($kind_id == 1){
                    $book_list['漫画'] = $pointGroups;
                }else{
                    $book_list['小説'] = $pointGroups;
                }
        }
        return $book_list;
        
    }
}
