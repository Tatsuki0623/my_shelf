<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Kind extends Model
{
    use HasFactory;
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    
    
    public function getBykind(int $limit_count=10)
    {
        $user = Auth::user()->id;
        
        return $this->books()->with('kind')->where('user_id',$user)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
