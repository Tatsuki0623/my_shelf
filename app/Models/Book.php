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
        'impressiom',
        'point',
        'image',
        'link_rakuten',
        'user_id',
        'kind_id',
        ];
    
    protected $attributes = [
        'volume' => 0,
        'point' => 0,
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
}
