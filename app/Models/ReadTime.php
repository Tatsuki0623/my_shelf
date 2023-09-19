<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ReadTime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'read_time',
        'user_id',
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getWeekReadTime()
    {
        $user = Auth::user()->id;
        return $this->where('user_id',$user)->orderBy('created_at','DESC')->paginate(7);
    }
    
    public function getTodayReadTime()
    {
        $user = Auth::user()->id;
        return $this->where('user_id',$user)->whereDay('created_at',date('d'))->orderBy('created_at','DESC')->first();
    }
}
