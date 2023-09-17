<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Memo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        $user = Auth::user()->id;
        
        return $this->where('user_id',$user)->orderBy('created_at', 'DESC')->paginate(10);
    }
}
