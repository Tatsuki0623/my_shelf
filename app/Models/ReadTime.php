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
    
    public function getReadTimes($user)
    {
        $user_id = $user->id;
        
        $week = $this->where('user_id',$user_id)->orderBy('created_at','DESC')->paginate(7,['*'],'ReadTime-page');
        $today = $this->where('user_id',$user_id)->whereDay('created_at',date('d'))->orderBy('created_at','DESC')->first();
        
        return $read_times = array(
                            'week' => $week,
                            'today' => $today,
                            );
        
    }
}
