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
        define('commic',1);
        define('novel',2);
        
        $split_url = substr($current_url,-1,1);
        
        $kind_id = $split_url[-1];
        
        if ($kind_id == "1"){
            $kind = $this::find(commic);
        }elseif($kind_id == "2"){
            $kind = $this::find(novel);
        }else{
            return "ページが存在しません";
        }
        
        $user = Auth::user()->id;
    
        return $kind->books()->with('kind')->where('user_id',$user)->orderBy('created_at', 'DESC')->paginate(5);
    }
}