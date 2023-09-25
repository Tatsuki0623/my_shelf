<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'public',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    public function memos()
    {
        return $this->hasMany(Memo::class);
    }
    
    public function read_times()
    {
        return $this->hasMany(ReadTime::class);
    }
    
    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class,'favorites','registing_id','registered_id')->withPivot('id','registing_id','registered_id');
    }
    
    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites','registered_id','registing_id')->withPivot('id','registered_id','registing_id');
    }
    
    
    
    public function getUsers()
    {
        return Auth::user()->whereNot('id',Auth::user()->id)->where('public',true)->paginate(10,['*'],'user-page');
    }
    
    public function getFavoriteUsers()
    {
        return $favorite_users = Auth::user()->favoriteUsers()->where('public',true)->paginate(10,['*'],'Favorite-page');;
    }
    
    public function checkFavorite($check_user)
    {
        $check = Auth::user()->favoriteUsers()->where([['registing_id', Auth::user()->id],['registered_id', $check_user]])->first();
        
        if($check){
            return true;
        }else{
            return false;
        }
    }
    
    public function attachFavorite($user_id) 
    {
        $registeing_user = $this::find(Auth::user()->id);
        return $registeing_user->favoriteUsers()->attach($user_id);
    }

    // フォロー解除する
    public function detachFavorite($user_id)
    {
        $registeing_user = $this::find(Auth::user()->id);
        return $registeing_user->favoriteUsers()->detach($user_id);
    }
}
