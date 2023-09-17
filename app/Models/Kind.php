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
    
    public function getFilterCommic($keyword)
    {
        if($keyword){
            
            $kind = $this::find(1);
            $user = Auth::user()->id;
            $filter = $kind->books()->with('kind')->where('user_id',$user)->where('title',"LIKE","%$keyword%")->orderBy('created_at', 'DESC')->paginate(5);
            
            return $filter;
        }else{
            
            return null;
        }
    }
    
    public function getFilterNovel($keyword)
    {
        if($keyword){
            
            $kind = $this::find(2);
            $user = Auth::user()->id;
            $filter = $kind->books()->with('kind')->where('user_id',$user)->where('title',"LIKE","%$keyword%")->orderBy('created_at', 'DESC')->paginate(5);
            
            return $filter;
        }else{
            
            return null;
        }
    }
}